<?php 
include "sidebar.php";
require "admin_script.php";
session_start();
if(!isset($_SESSION['admin'])){
    header('location: signin.php');
}else{
?>

<!-- SEARCH USERS -->
<br>
<div>
    <table class="table table-hover text-center">
        <thead>
            <tr class="table-dark">
                <th scope="col">No</th>
                <th scope="col">Email</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">RegisterDate</th>
                <th scope="col">Details</th>
            </tr>
        </thead>
        <tbody>
            <?php display_table()?>
        </tbody>
    </table>
</div>


</section> 

</body>
</html>
<?php
}?>