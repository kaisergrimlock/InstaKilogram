<?php 
session_start(); 
require('script.php');
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" type="text/css" href="user.css">
</head>

<body>
    <main>
        <?php include ('../header.php')?>
        <br>
        <div class="container bootstrap snippets bootdey">
            <div class="row">
                <div class="profile-nav col-md-3">
                    <div class="panel">
                        <div class="user-heading round"> Discover new posts</div>
                    </div>
                </div>
                <div class="profile-info col-md-9">
                    <div class="post">
                        <?php post_image_feed()?>
                    </div>
                </div>
            </div>


    </main>
    <?php include("../footer.php")?>
</body>

</html>