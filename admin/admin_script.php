<?php
#Display Table Function
function display_table(){
    $array = csvToArray('../user/account.csv');
    usort($array, 'mysort');
    array2csv($array, '../user/account.csv');
    if (($handle = fopen('../user/account.csv','r'))!== FALSE) {
        $row = 1;
        while (($data =  fgetcsv($handle,1000,",")) !== FALSE) {
            echo "<tr>";
            echo '<td scope="row">'.$row++.'</td>';
            echo '<td scope="row">'.$data[1].'</td>';
            echo '<td scope="row">'.$data[2].'</td>';
            echo '<td scope="row">'.$data[3].'</td>';
            echo '<td scope="row">'.$data[4].'</td>';
            echo '<td scope="row"> <a href="detail.php?email='.$data[1].'"><button class="btn btn-dark">Details</button></a></td>';
            echo"</tr>";
        }
    }else{
        echo"Error";
    } 
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

function array2csv($data, $newdata, $delimiter = ',', $enclosure = '"', $escape_char = "\\")
{
    $f = fopen($newdata, 'r+');
    if($data !== NULL){
        foreach ($data as $item) {
            fputcsv($f, $item, $delimiter, $enclosure, $escape_char);
        }
    }
    rewind($f);
    return stream_get_contents($f);
}

//Display Detail
function display_detail($data){
    echo "<tr>";
    echo '<td scope="row">'.$data[1].'</td>';
    echo '<td scope="row">'.$data[2].'</td>';
    echo '<td scope="row">'.$data[3].'</td>';
    echo '<td scope="row"><img src="../user/profile_img/'.$data[6].'" width="70%"></img></td>';
    echo '<td scope="row">'.$data[5].'</td>';
    echo '<td scope="row"><a href="reset.php?pass='.$data[5].'"><button class="btn btn-dark">Reset Password</button></a></td>';
    echo"</tr>";
}
//Display Post
function post_image_feed(){
    if(isset($_GET['img'])){
        $img_id = $_GET['img'];
    }else{
        $img_id = '';
    }
    if (($handle = fopen('../user/post.csv','r'))!== FALSE){
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
    echo '<td scope="row">'.$data[0].'</td>';
    echo '<td scope="row">'.$data[3].'</td>';
    if(isset($data[1])){
        echo '<td scope="row"><img src="../user/img_post/'.$data[1].'" width="30%"></img></td>';
        echo '<td scope="row"> <a href="post.php?img='.$data[1].'"><button class="btn btn-dark" id="deleteBtn">Delele</button></a></td>';
    }else{
        echo '<td scope="row">Deleted</td>';
        echo '<td scope="row">No Operation</td>';
    }
    echo"</tr>";
}

function delete(){
    $table = fopen('../user/post.csv','r');
    $temp_table = fopen('../user/temp_post.csv','w');
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
    rename('../user/temp_post.csv','../user/post.csv');
}

#Search User
function search_user(){
    $array = csvToArray('../user/account.csv');
    usort($array, 'mysort');
    array2csv($array, '../user/account.csv');
    if(isset($_POST['search'])){
        $search = $_POST['search'];
    }else{
        $search = ' ';
    } 
    $regular_expression = sprintf("/%s/i",$search);
    if (($handle = fopen('../user/account.csv','r'))!== FALSE) {
        $row = 1;
        $match = FALSE;
        while (($data =  fgetcsv($handle,1000,",")) !== FALSE) {
            if(preg_match($regular_expression,$data[1]) || preg_match($regular_expression,$data[2]) || preg_match($regular_expression,$data[3])){
                echo "<tr>";
                echo '<td scope="row">'.$row++.'</td>';
                echo '<td scope="row">'.$data[1].'</td>';
                echo '<td scope="row">'.$data[2].'</td>';
                echo '<td scope="row">'.$data[3].'</td>';
                echo '<td scope="row">'.$data[4].'</td>';
                echo '<td scope="row"> <a href="detail.php?email='.$data[1].'"><button class="btn btn-dark">Details</button></a></td>';
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
        $table = fopen('../user/account.csv','r');
        $temp_table = fopen('../user/temp_account.csv','w');
        while (($data = fgetcsv($table, 1000)) !== FALSE){
            if($data[5] == $_GET['pass']){
                 $data[5] = $psw_val;
            }
            fputcsv($temp_table,$data);
        }
        fclose($table);
        fclose($temp_table);
        // rename_win('../user/temp_account.csv','../user/account.csv');
        rename('../user/temp_account.csv','../user/account.csv');
        header('location: crud.php');
    }
}



#Sign-in Admin
if(isset($_POST["btn_signin"])){
    $user = ($_POST['admin-name']);
    $pass = ($_POST['admin-password']);
    $state = false;
    if($user == 'admin' && $pass == 'password'){
        session_start();
        $_SESSION['admin'] = true;
        header('location: ../admin/crud.php');
    }
}
?>