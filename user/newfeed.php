<?php 
session_start(); 
require('script.php');
if (!isset($_SESSION['email'])) {
    require "signin.php";
}else{
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="account.css">
</head>

<body>
    <section>
    <?php include ('../bootstrap.php')?>
    <div class="container bootstrap snippets bootdey">
        <div class="panel">
            <div  class="post">
                <?php post_image_feed()?>
            </div>
        </div>

    </div>
    </section>
</body>
</html>
<?php
}
?>