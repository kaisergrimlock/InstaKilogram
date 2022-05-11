
<?php 
session_start();
include "sidebar.php";
require "admin_script.php";

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
    <form action="">
        <input type=text name='reset-psw' class="form-control"> </input> 
        <input type="submit" class="btn btn-danger" name="btn_reset">
        <button type="button" class="btn btn-danger">Close</button>
    </form>
    <?php reset_pwd($data);?>
</body>
</html>