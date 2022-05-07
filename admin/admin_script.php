<?php

#Display Table Function
function display_table(){
    if (($handle = fopen('../user/account.csv','r'))!== FALSE) {
        while (($data =  fgetcsv($handle,1000,",")) !== FALSE) {
            echo "<tr>";
            echo '<td scope="row">'.$data[0].'</td>';
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

//Display Detail
function display_detail($data){
    echo "<tr>";
    echo '<td scope="row">'.$data[1].'</td>';
    echo '<td scope="row">'.$data[2].'</td>';
    echo '<td scope="row">'.$data[3].'</td>';
    echo '<td scope="row">'.$data[5].'</td>';
    echo '<td scope="row"> <a href="detail.php"><button class="btn btn-dark">Reset Password</button></a></td>';
    echo"</tr>";
}
//Display Post
function post_image_feed(){
    if (($handle = fopen('../user/post.csv','r'))!== FALSE){
            while (($data =  fgetcsv($handle,1000,",")) !== FALSE){
                if($data[1] == $_GET["img"]){
                        unset($data);
                    } 
                    display_img($data);
                         
            }
        }
    }

//Delete Image
function delete_image(){
if (($handle = fopen('../user/post.csv','r'))!== FALSE){
                while (($data =  fgetcsv($handle,1000,",")) !== FALSE){
                    delete_image($data);
                }
            }
        }

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
        if($data[1] == $_GET['img']){ // this is if you need the first column in a row
            echo('delte');
            continue;
        }
        fputcsv($temp_table,$data);
    }
    fclose($table);
    fclose($temp_table);
    rename('temp_post.csv','post.csv');

}
?>