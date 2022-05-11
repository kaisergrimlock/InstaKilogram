<?php require('script.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <script defer src="register.js"></script>
    <link rel="stylesheet" type="text/css" href="user.css">
</head>

<body>
    <?php include("../header.php");?>
    <section>
        <div id="alert-validation"></div>
        <div class="container">
            <form action="" method="post" enctype="multipart/form-data" class="form-group row"
                onsubmit="validateForm()">
                <h1 class="text-center">Create an Account...</h1>
                <div class="">
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Email Address:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Last Name:</label>
                    <input type="text" name="lname" id="lname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">First Name:</label>
                    <input type="text" name="fname" id="fname" value="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="formFile" class="form-label mt-4">Profile Image: </label>
                    <input class="form-control" type="file" id="formFile" name='img-upload'>
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Retype Password:</label>
                    <input type="password" name="reptpassword" id="reptpassword" class="form-control" required> <br>
                </div>
                <div class="buttons">
                    <input type="submit" name="btn_signup" value="Submit" class="btn btn-danger">
                    <input type="reset" value="Clear" class="btn btn-danger" id="reset" required>
                </div>
                <div class="signin-button">
                    <small class="form-text text-muted">Already have an account? <a href="./signin.php">Login
                            here</a></small>
                </div>

            </form>
        </div>
        <?php include_once("../footer.php")?>
</body>

</html>