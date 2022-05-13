<?php 
 require('script.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Page</title>
    <script defer src="register.js"></script>
    <link rel="stylesheet" type="text/css" href="user.css">
</head>

<body>
    <?php include("../header.php");?>
    <div class="container">
        <div class="form-container">
            <form method="post" enctype="multipart/form-data" class="form-group row">
                <h2 class="text-center">Sign In</h2>
                <div class="form-group">
                    <label for="email" class="form-label mt-4">Email Address:</label>
                    <input type="email" name="email" id="email" placeholder="Enter email address" class="form-control"
                        required>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label mt-4">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Enter password"
                        class="form-control" required>
                </div>
                <small class="form-text text-muted"><a href="/InstaKilogram/user/reset.php">Forgot your
                        password?</a></small>
                <div class="buttons">
                    <br>
                    <input type="submit" value="Sign In" class="btn btn-danger" name="btn_signin">
                </div>
            </form>
            <div class="signin-button">
                <small class="form-text text-muted">Don't have an account yet? <a
                        href="/InstaKilogram/user/register.php">Register here</a></small>
            </div>
        </div>
    </div>
    <?php include_once("../footer.php")?>
</body>

</html>