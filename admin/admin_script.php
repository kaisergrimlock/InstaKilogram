<?php

#Display Table Function
function display_table(){
    if (($handle = fopen('../user/account.csv','r'))!== FALSE) {
        $row = 1;
        while (($data =  fgetcsv($handle,1000,",")) !== FALSE) {
            echo "<tr>";
            echo '<td scope="row">'.$data[0].'</td>';
            echo '<td scope="row">'.$data[1].'</td>';
            echo '<td scope="row">'.$data[2].'</td>';
            echo '<td scope="row">'.$data[3].'</td>';
            echo '<td scope="row">'.$data[4].'</td>';
            echo '<td scope="row"> <a href="detail.php"><button class="btn btn-dark">Details</button></a></td>';
            echo"</tr>";
        }
    }else{
        echo"Error";
    } 
}

//Display Detail
function display_detail($array){
            echo "<tr>";
            echo '<td scope="row">'.$array[1].'</td>';
            echo '<td scope="row">'.$array[2].'</td>';
            echo '<td scope="row">'.$array[3].'</td>';
            echo '<td scope="row">'.$array[5].'</td>';
            echo '<td scope="row"> <a href="detail.php"><button class="btn btn-dark">Reset Password</button></a></td>';
            echo"</tr>";
        }
        


?>