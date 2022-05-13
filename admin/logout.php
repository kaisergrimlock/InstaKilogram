<?php
session_start();
$_SESSION['admin'];
session_destroy();
echo("<script>location.href = '/InstaKilogram/index.php';</script>");
//header('location:/InstaKilogram/index.php');
    ?>