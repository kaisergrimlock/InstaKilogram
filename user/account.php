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
    <title>Profile Page</title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="account.css">
</head>

<body>
    <section> 
    <?php include ('../bootstrap.php')?>
    <br>
    <div class="container bootstrap snippets bootdey">
    <div class="row">
    <div class="profile-nav col-md-3">
        <div class="panel">
            <div class="user-heading round">
                <a href="#">
                    <img src="./profile_img/<?=$_SESSION['img-upload'] ?>" alt="profile picture" >
                </a>
                <h1 class="fname"><?=$_SESSION['fname'] ?></h1>
                <p class="email"><?=$_SESSION['email']  ?></p>
                <form action="" method="post" enctype="multipart/form-data" class="upload-form">
                    <label class="btn btn-outline-dark" for="profile_change">Change Profile</label>
                    <input type="file" id="profile_change" name='profile_change'>
                </form>
            </div>
        </div>
    </div>
    <div class="profile-info col-md-9">
        <div class="panel">
            <form action="" method="post" enctype="multipart/form-data" class="upload-form">
                <textarea placeholder="What's in your mind today?" rows="2" class="form-control input-lg p-text-area" name="text_post"></textarea>
                    <input type="submit" class="btn btn-danger pull-right" name="btn_upload_post">
                    <div class="panel-upload">
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-map-marker"></i></a>
                            </li>
                            <li>
                                <label for="formFile"><i class="fa fa-camera"></i></label>
                                <input type="file" id="formFile" name='post-upload'>
                            </li>
                            <li>
                                <a href="#"><i class=" fa fa-film"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-microphone"></i></a>
                            </li>
                            <li>
                                <div>
                                    <input type="radio" class="form-check-input" id="public" name="privacy" value="public" checked>
                                    <label class="form-check-label" for="public">Public</label>
                                    <input type="radio" class="form-check-input" id="private" name="privacy" value="private">
                                    <label class="form-check-label" for="private">Private</label>
                                    <input type="radio" class="form-check-input" id="internal" name="privacy" value="internal">
                                    <label class="form-check-label" for="public">Internal Use</label>
                                </div>
                            </li>
                        </ul>
                    </div>
            </form>
        </div>
    
        <div class="panel">
            <div class="bio-graph-heading">
                <h4>About </h4>
            </div>
           <div class="panel-body bio-graph-info">
                <h1>Bio Graph</h1>
                <div class="row">
                    <div class="bio-row" id="fname">
                        <p><span>First Name </span>: <?=$_SESSION['fname'] ?></p>
                    </div>
                    <div class="bio-row" id="lname">
                        <p><span>Last Name </span>: <?=$_SESSION['lname'] ?></p>
                    </div>
                </div>
            </div>
        </div> <br>
        <div class="post">
            <div class="bio-graph-heading">
            <h4>Images You Share</h4>
            </div>
            <div class="panel-body bio-graph-info">
                <?php post_image()?>
            </div>
        </div>
    </div>
    </div>
    </div>
    </section>
    <?php include("../footer.php")?>
</body>
</html>
<?php
}
?>