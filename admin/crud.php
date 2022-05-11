<?php 
session_start();
include "sidebar.php";
require "admin_script.php";
if(!isset($_SESSION['admin'])){
    header('location: signin.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <br>
        <div>
            <!-- DISPLAY USERS -->
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
</html>
<?php
}?>