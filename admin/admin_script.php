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
    echo '<td scope="row"><img src="../user/profile_img/'.$data[6].'" width="100%"></img></td>';
    echo '<td scope="row">'.$data[5].'</td>';
    echo '<td scope="row"> <a href="detail.php"><button class="btn btn-dark">Reset Password</button></a></td>';
    echo"</tr>";
}
//Display Post
function post_image_feed(){
    if (($handle = fopen('../user/post.csv','r'))!== FALSE){
            while (($data =  fgetcsv($handle,1000,",")) !== FALSE){
                if($data[1] == $_GET["img"]){
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
            echo '<td scope="row"><img src="../user/img_post/'.$data[1].'" width="30%"></img></td>';
            echo '<td scope="row"> <a href="post.php?img='.$data[1].'"><button class="btn btn-dark" id="deleteBtn">Delele</button></a></td>';
            echo"</tr>";
}

function delete(){
    $table = fopen('../user/post.csv','r');
    $temp_table = fopen('../user/temp_post.csv','w');

    while (($data = fgetcsv($table, 1000)) !== FALSE){
        if($data[1] == $_GET['img']){
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
    $search = $_GET['search'];
    if($search == NULL){
        $search = '.';
    }
    $match = FALSE;
    $regular_expression = sprintf("/%s/",$search);
    if (($handle = fopen('../user/account.csv','r'))!== FALSE) {
        $row = 1;
        while (($data =  fgetcsv($handle,1000,",")) !== FALSE) {
            if(preg_match($regular_expression,$data[0])){
                $match = TRUE;
            }
            if($match = TRUE){
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
?>