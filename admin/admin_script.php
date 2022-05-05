<?php

#Display Table Function
function display_table(){
    if (($handle = fopen('../user/user_data.csv','r'))!== FALSE) {
        $row = 1;
        while (($data =  fgetcsv($handle,1000,",")) !== FALSE) {
            echo "<tr>";
            echo '<td scope="row">'.$row++.'</td>';
            echo '<td scope="row">'.$data[0].'</td>';
            echo '<td scope="row">'.$data[1].'</td>';
            echo '<td scope="row">'.$data[2].'</td>';
            echo '<td scope="row"> <a href="detail.php"><button class="btn btn-dark">Details</button></a></td>';
            echo"</tr>";
        }
    }else{
        echo"Error";
    } 
}
?>