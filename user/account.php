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
    <link rel="stylesheet" type="text/css" href="user.css">


<body>

    <?php include ('../header.php')?>
    <br>
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="profile-nav col-md-3">
                <div class="panel">
                    <div class="user-heading round">
                        <a href="account.php">
                            <img src="./profile_img/<?=$_SESSION['img-upload']?>" alt="profile picture">
                        </a>
                        <h2 class="fname"><?=$_SESSION['fname'] ?></h2>
                        <p class="email"><?=$_SESSION['email']  ?></p>
                        <button class="btn btn-outline-dark" data-toggle="modal" data-target="#changeProfile">
                            Change Profile</button>
                        <!-- The Modal Change Profile Image-->
                        <div class="modal" id="changeProfile">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title text-muted">
                                            Change Your Profile Image
                                        </h4>
                                        <button type="button" class="btn-close" data-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form enctype="multipart/form-data" method="post" action="account.php">
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <label for="replace_image" class="form-label mt-4 text-muted">
                                                Upload Here
                                            </label>
                                            <input type="file" class="form-control" name="replace_image"
                                                id="replace_image"
                                                oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                            <img id="pic" class="preview-pic"
                                                src="./profile_img/<?=$_SESSION['img-upload']?>" alt="preview" />
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-danger pull-right" value="Change Image"
                                                name="replace_submit">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="profile-info col-md-9">
                <form method="post" enctype="multipart/form-data" class="upload-form">
                    <div class="panel">
                        <textarea placeholder="What's in your mind today?" rows="2"
                            class="form-control input-lg p-text-area" name="text_post"></textarea>
                        <div class="panel-upload">
                            <ul>
                                <li>
                                    <a href="#"><i class="fa fa-map-marker"></i></a>
                                </li>
                                <li>
                                    <i class="fa fa-camera" data-toggle="modal" data-target="#postImage"></i>
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
                    <!-- The Modal Post Image-->
                    <div class="modal" id="postImage">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Post Your Image</h4>
                                    <button type="button" class="btn-close" data-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <label for="formFile" class="form-label mt-4">Upload Here</label>
                                    <input type=file id="formFile" name='post-upload' class="form-control"
                                        oninput="pre.src=window.URL.createObjectURL(this.files[0])">
                                    <div class="text-center">
                                        <img id="pre" class="preview-pic" alt="preview"
                                            src="../images/placeholder-image.png" />
                                    </div>
                                    <div>
                                        <input type="radio" class="form-check-input" id="public" name="privacy"
                                            value="public" checked>
                                        <label class="form-check-label" for="public">Public</label>
                                        <input type="radio" class="form-check-input" id="private" name="privacy"
                                            value="private">
                                        <label class="form-check-label" for="private">Private</label>
                                        <input type="radio" class="form-check-input" id="internal" name="privacy"
                                            value="internal">
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
                        <h2>Bio Graph</h2>
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

    <?php include("../footer.php")?>
</body>

</html>
<?php
}
?>