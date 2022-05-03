<?php include "sidebar.php"?>

<!-- SEARCH USERS -->
<form action="search.php" method="POST">
        <div class="row mx-3">
            <div class="col-11">
                <input class="form-control me-sm-2" name="search" type="text" placeholder="Search User">  
            </div> 
             <div class="col-1">
            <button class="btn btn-info" type="submit">Search</button>
            </div> 
        </div>      
</form>
<br>
<div>
    <table class="table table-hover text-center">
        <thead>
            <tr class="table-dark">
                <th scope="col">No</th>
                <th scope="col">Email</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                 <th scope="col">Details</th>
            </tr>
        </thead>
        <tbody>
            <?php
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
            ?>
        </tbody>
    </table>
</div>


</section> 

</body>
</html> 