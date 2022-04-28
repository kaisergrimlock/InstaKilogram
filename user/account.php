<?php 
session_start(); 
if (!isset($_SESSION['email'])) {
    include "signin.php";
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
                <h1><?=$_SESSION['fname'] ?></h1>
                <p><?=$_SESSION['email']  ?></p>
                <button class="btn btn-outline-dark"> Change Profile</button>
            </div>
        </div>
    </div>
    <div class="profile-info col-md-9">
        <div class="panel">
            <form class="upload-form">
                <textarea placeholder="What's in your mind today?" rows="2" class="form-control input-lg p-text-area"></textarea>
                    <input type="submit" class="btn btn-danger pull-right">
                    <div class="panel-upload">
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-map-marker"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-camera"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class=" fa fa-film"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-microphone"></i></a>
                            </li>
                        </ul>
                    </div>
            </form>
        </div>
    
        <div class="panel">
            <div class="bio-graph-heading">
                Aliquam ac magna metus. Nam sed arcu non tellus fringilla fringilla ut vel ispum. Aliquam ac magna metus.
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
                    <div class="bio-row" id="country">
                        <p><span>Country </span>: Australia</p>
                    </div>
                    <div class="bio-row" id="bday">
                        <p><span>Birthday</span>: 13 July 1983</p>
                    </div>
                    <div class="bio-row" id="job">
                        <p><span>Occupation </span>: UI Designer</p>
                    </div>
                    <div class="bio-row" id="email">
                        <p><span>Email </span>: jsmith@flatlab.com</p>
                    </div>
                    <div class="bio-row" id="mobile">
                        <p><span>Mobile </span>: (12) 03 4567890</p>
                    </div>
                    <div class="bio-row" id="phone">
                        <p><span>Phone </span>: 88 (02) 123456</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    </div>
    </div>
        </section>
</body>
</html>
<?php
}
?>