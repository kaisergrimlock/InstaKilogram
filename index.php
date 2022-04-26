
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
    <div id="cookies">
      <div class="alert alert-dismissible alert-light">
          <div class="cookies">
              <p>We use cookies to personalize your experience. By continuing to this website you agree to our use of cookies</p>
              <button id="cookies-btn" type="button" class="btn btn-info">Got it!</button>
              <a href="#">Read our policies</a>
          </div>
      </div>
  </div>

    <main>
        <img class="center"src="./images/logo.jpeg" style=" width:300px " >
        <div class="box"> <h1> New to the website?</h1> </div>
        <div class="box">
        <a href="/InstaKilogram/user/register.php">
          <button class="btn btn-outline-danger btn-lg">Register</button>
         </a> 
        </div>
        
       
    </main>

  </body>
</html>