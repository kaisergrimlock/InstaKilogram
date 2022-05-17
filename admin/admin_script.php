<?php
#Display Table Function
function display_table(){
    $array = csvToArray('../../../account.db.csv');
    usort($array, 'mysort');
    array2csv($array, '../../../account.db.csv');
    $maxpage = count_row()%5;
    $page = 1;
    if(isset($_GET['from'])){
        $page = $_GET['from'];
    }
    if (($handle = fopen('../../../account.db.csv','r'))!== FALSE) {
        if($page != 1){
            for($i = $page - 1; $i < $maxpage; $i++){
                for($j = 0; $j < 5; $j++){
                    fgetcsv($handle, 1000,);
                }
            }
        }
        $row = 1;
        while (($data =  fgetcsv($handle,1000,",")) !== FALSE) {
            if($row <= 5){
                echo "<tr>";
                echo '<td>'.$row++.'</td>';
                echo '<td>'.$data[1].'</td>';
                echo '<td>'.$data[2].'</td>';
                echo '<td>'.$data[3].'</td>';
                echo '<td>'.$data[4].'</td>';
                echo '<td> <a href="detail.php?email='.$data[1].'" class="btn btn-dark">Details</a></td>';
                echo"</tr>";
            }
        }
    }else{
        echo"Error";
    } 
}

//Display Pagination
function pagination(){
    $maxpage = count_row()/5;
    $page = 1;
    echo '<nav aria-label="Page navigation example">';
    echo '<ul class="pagination">';
    for($i = 1; $i <= $maxpage; $i++){
        echo'<li class="page-item"><a class="page-link" href="crud.php?from='.$i.'">'.$i.'</a></li>';
    }
    echo '</ul>';
    echo '</nav>';
}

//Count Row
function count_row(){
    $num_row = 1;
    if (($handle = fopen('../../../account.db.csv','r'))!== FALSE) {
        while (($data =  fgetcsv($handle,1000,",")) !== FALSE) {
            $num_row++;
        }
    }else{ 
        echo"Error";
    }
    return $num_row;
}


//Sort
function mysort($p1, $p2){
    return strtotime($p2[4]) - strtotime($p1[4]);
}
function csvToArray($csvFile){
    $handle = fopen($csvFile, "r");
    while (($data = fgetcsv($handle)) !==false){
        if(array(null) !== $data)
        {
            $lines[] = $data;
        }
    }
    return $lines;
}

function array2csv($data, $newdata, $delimiter = ',', $enclosure = '"'){
    $file = fopen($newdata, 'w+');
    foreach ($data as $data_line) {
        fputcsv($file, $data_line, $delimiter, $enclosure);
    }

    $data_read="";
    rewind($file);
    //read CSV
    while (!feof($file)) {
        $data_read .= fread($file, 8192); // will return a string of all data separeted by commas.
    }
    fclose($file);
}

//Display Detail
function display_detail($data){
    echo "<tr>";
    echo '<td>'.$data[1].'</td>';
    echo '<td>'.$data[2].'</td>';
    echo '<td>'.$data[3].'</td>';
    echo '<td><img src="../user/profile_img/'.$data[6].'" width="200" alt="profile picture"/></td>';
    echo '<td>'.$data[5].'</td>';
    echo '<td><a href="reset.php?pass='.$data[5].'" class="btn btn-dark">Reset Password</a></td>';
    echo"</tr>";
}
//Display Post
function post_image_feed(){
    if(isset($_GET['img'])){
        $img_id = $_GET['img'];
    }else{
        $img_id = '';
    }
    if (($handle = fopen('../../../post.csv','r'))!== FALSE){
            while (($data =  fgetcsv($handle,1000,",")) !== FALSE){
                if($data[1] == $img_id){
                        unset($data[1]);
                    } 
                    display_img($data);
                         
            }
        }
    }

//Delete Image
function display_img($data){
    echo "<tr>";
    echo '<td>'.$data[0].'</td>';
    echo '<td>'.$data[3].'</td>';
    if(isset($data[1])){
        echo '<td><img src="../user/img_post/'.$data[1].'" width="188" alt="posted image"/></td>';
        echo '<td> <a href="post.php?img='.$data[1].'" class="btn btn-dark">Delele</a></td>';
    }else{
        echo '<td>Deleted</td>';
        echo '<td>No Operation</td>';
    }
    echo"</tr>";
}

function delete(){
    $table = fopen('../../../post.csv','r');
    $temp_table = fopen('../../../temp_post.csv','w');
    if(isset($_GET['img'])){
        $img_id = $_GET['img'];
    }else{
        $img_id = '';
    }
    while (($data = fgetcsv($table, 1000)) !== FALSE){
        if($data[1] == $img_id){
            continue;
        }
        fputcsv($temp_table,$data);
    }
    fclose($table);
    fclose($temp_table);
    rename('../../../temp_post.csv','../../../post.csv');
}

#Search User
function search_user(){
    $array = csvToArray('../../../account.db.csv');
    usort($array, 'mysort');
    array2csv($array, '../../account.db.csv');
    if(isset($_POST['search'])){
        $search = $_POST['search'];
    }else{
        $search = ' ';
    } 
    $regular_expression = sprintf("/%s/i",$search);
    if (($handle = fopen('../../../account.db.csv','r'))!== FALSE) {
        $row = 1;
        $match = FALSE;
        while (($data =  fgetcsv($handle,1000,",")) !== FALSE) {
            if(preg_match($regular_expression,$data[1]) || preg_match($regular_expression,$data[2]) || preg_match($regular_expression,$data[3])){
                echo "<tr>";
                echo '<td>'.$row++.'</td>';
                echo '<td>'.$data[1].'</td>';
                echo '<td>'.$data[2].'</td>';
                echo '<td>'.$data[3].'</td>';
                echo '<td>'.$data[4].'</td>';
                echo '<td> <a href="detail.php?email='.$data[1].'" class="btn btn-dark">Details</a></td>';
                echo"</tr>";
            }
        }
    }else{
        echo"Error";
    } 
}


#Reset Password
function reset_pwd(){
     if(isset($_POST['btn_reset'])){
        $psw_raw = $_POST['reset-psw'] ;
        $psw_val = password_hash($psw_raw, PASSWORD_DEFAULT);
        $table = fopen('../../../account.db.csv','r');
        $temp_table = fopen('../../../temp_account.db.csv','w');
        while (($data = fgetcsv($table, 1000)) !== FALSE){
            if($data[5] == $_GET['pass']){
                 $data[5] = $psw_val;
            }
            fputcsv($temp_table,$data);
        }
        fclose($table);
        fclose($temp_table);
        // rename_win('../user/temp_account.csv','../user/account.csv');
        rename('../../temp_account.db.csv','../../account.db.csv');
        // header('location: crud.php');
        echo("<script>location.href = 'crud.php';</script>");
        //header('location: crud.php');
    }
}



#Sign-in Admin
if(isset($_POST["btn_signin"])){
    $user = ($_POST['admin-name']);
    $pass = ($_POST['admin-password']);
    $state = false;
    if($user == 'admin' && $pass == 'password'){
        $_SESSION['admin'] = true;
        echo("<script>location.href = 'crud.php';</script>");
        //header('location: ../admin/crud.php');
    }
}
?>