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
                <a href="../user/profile_replace.php" class="btn btn-danger">Change Profile</a>        
            </div>
        </div>
    </div>
   
    <div class="profile-info col-md-9">
        <div class="panel">
            <form action="" method="post" enctype="multipart/form-data" class="upload-form">
                <textarea placeholder="What's in your mind today?" rows="2" class="form-control input-lg p-text-area" name="text_post"></textarea>
                    <div class="panel-upload">
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-map-marker"></i></a>
                            </li>
                            <li>
                                <i class="fa fa-camera" data-toggle="modal" data-target="#myModal"></i></label> 
                            </li>
                            <li>
                                <a href="#"><i class=" fa fa-film"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-microphone"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- The Modal -->
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Post Your Image</h4>
                                <button type="button" class="btn-close" data-dismiss="modal"  aria-label="Close"></button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <label for="formFile" class="form-label mt-4">Default file input example</label>
                                <input type=file id="formFile" name='post-upload' class="form-control" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                <img id="pic" style="width:50%"/>
                                <div>
                                    <input type="radio" class="form-check-input" id="public" name="privacy" value="public" checked>
                                    <label class="form-check-label" for="public">Public</label>
                                    <input type="radio" class="form-check-input" id="private" name="privacy" value="private">
                                    <label class="form-check-label" for="private">Private</label>
                                    <input type="radio" class="form-check-input" id="internal" name="privacy" value="internal">
                                    <label class="form-check-label" for="public">Internal Use</label>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-danger pull-right" name="btn_upload_post">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>                        
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