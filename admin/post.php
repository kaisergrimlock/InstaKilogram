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
    <title>List of Users</title>
</head>

<body>
    <main>
        <table class="table table-hover text-center">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Caption</th>
                    <th scope="col">User</th>
                    <th scope="col">Image</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php 
           post_image_feed();
           delete();
            ?>
            </tbody>
        </table>

        <?php
}?>
    </main>
</body>

</html>