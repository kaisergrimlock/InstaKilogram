
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body class="bg">
    <?php include("cookies.php")?>

    <main>
        <img class="center"src="./images/logo.jpeg" style=" width:300px " >
        <div class="box"> <h1> New to the website?</h1> </div>
        <div class="box">
        <a href="/InstaKilogram/user/register.php">
          <button class="btn btn-outline-danger btn-lg">Register</button>
         </a> 
         <a href="/InstaKilogram/user/signin.php">
          <button class="btn btn-outline-danger btn-lg">Sign in</button>
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
  <footer>
    <section class="footer">
        <div class="social">
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-facebook-f"></i></a>
        </div>
        <ul class="list">
          <li>
            <a href="#">About</a>
          </li>  
          <li>
            <a href="#">Privacy</a>
          </li>
          <li>
            <a href="#">Help Links</a>
          </li>    
        </ul> 
        <p class="copyright">
          Copyright &copy; Group1. All Rights Reserved
        </p>
    </section>
  </footer>
</html>