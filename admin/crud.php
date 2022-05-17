<?php 
session_start();
include "sidebar.php";
require "admin_script.php";
if(!isset($_SESSION['admin'])){
    echo("<script>location.href = 'signin.php';</script>");
    //header('location: signin.php');
}else{
?>
<!-- DISPLAY USERS -->

<table class="table table-hover text-center">
    <thead>
        <tr class="table-dark">
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
<?php count_row()?>
<?php pagination()?>
</div>
</div>

</html>
<?php
}?>