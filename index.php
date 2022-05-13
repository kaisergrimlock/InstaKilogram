<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InstaKilogram</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <script defer src="cookies.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg">
    <?php 
    include("header.php");
    include("cookies.php")?>

    <div class="text-center">
        <img class="img-index" src="./images/logo.jpeg" alt="logo">
    </div>
    <div class="box-index">
        <h1> New to the website?</h1>
    </div>
    <div class="box-index">
        <a href="/InstaKilogram/user/register.php" class="btn btn-outline-danger btn-lg">
            Register
        </a>
        <a href="/InstaKilogram/user/signin.php" class="btn btn-outline-danger btn-lg">
            Sign in
        </a>
    </div>

    <?php
?>
    <?php include_once("footer.php")?>
</body>

</html>