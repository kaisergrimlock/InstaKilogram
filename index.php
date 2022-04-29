
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InstaKilogram</title>
    <link rel="stylesheet" href="index.css">
    <script defer src="header.js"></script>
    <script defer src="./cookies/cookies.js"></script>
  </head>

  <body class="bg">
    <?php
    require ("bootstrap.php")
    ?>
    <?php include("cookies.php")?>

    <main>
        <img class="center"src="./images/logo.jpeg" style=" width:300px " >
        <div class="box"> <h1> New to the website?</h1> </div>
        <div class="box">
        <a href="/InstaKilogram/user/register.php">
          <button class="btn btn-outline-danger btn-lg">Register</button>
         </a> 
        </div>
    </main>
    <?php
if(isset($_POST['submit'])){
	
	$name=$_FILES['upload']['name'];
	$img_name=$_FILES['upload']['tmp_name'];
    $folder='upload/';
	move_uploaded_file($img_name,$folder.$name);
}

?>
  </body>
</html>