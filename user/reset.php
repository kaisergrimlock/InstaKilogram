<?php 
 require('script.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Page</title>
    <script defer src="register.js"></script>
    <link rel="stylesheet" href="user.css">
</head>
<body>
<?php include("../bootstrap.php");?>
    <div class="container">
        <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data" class="form-group row">
            <h1 class="text-center">Reset Password</h1>
            <div class="form-group">
                <label for="username" class="form-label mt-4">New Password:</label>
                <input type="password" name="rstpswd" id="password"  placeholder="Enter new password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label mt-4">Confirm Password</label>
                <input type="password" name="conreset" id="password" placeholder="Confirm password" class="form-control" required> <br>
            </div>
            <div class="buttons">
                <input type="submit" value="Reset" class="btn btn-danger" name="btn_reset">
            </div>
             <div class="signin-button">
                <small class="form-text text-muted">Already have an account? <a href="./signin.php">Login here</a></small>
            </div>
        </form>

    </div>
    </div>
    <?php include_once("../footer.php")?>
</body>
</html>