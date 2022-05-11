<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UFT-8">
    <meta http-epuiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin.css">
    <script defer src="../header.js"></script>
    <?php include('admin_script.php')?>
</head>
<body>
    <section>
        <header id="app-header"></header>
        
    <div class="container">
        <form method="post" enctype="multipart/form-data" class="form-group row">
            <h1>Admin Login</h1>
            <div class="form-group">
                <label for="admin-name" class="form-label mt-4">Username</label>
                <input type="text" placeholder="Admin Username" name="admin-name" class="form-control" id="admin-name">
            </div>
            <div class="form-group">
                <label for="admin-name" class="form-label mt-4">Password</label>
                <input type="text" placeholder="Password" name="admin-password" class="form-control" id="admin-password"> <br>
            </div>
            <div class="buttons">
                <input type="submit" value="Sign In" class="btn btn-danger" id="submit" name="btn_signin">
            </div>   
    </div>
    </section>

    
</body>

</html>