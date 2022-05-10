<?php 
session_start(); 
require('script.php');
if (!isset($_SESSION['email'])) {
    header('Location: signin.php');
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
    <form enctype="multipart/form-data" enctype="multipart/form-data"  method="post">
        <input type="file" name="replace_image">
        <input type="submit" name="submit_image">
    </form>
      
</body>
</html>
</section>
<?php include("../footer.php")?>
</body>
</html>
<?php
}
?>