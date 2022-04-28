<?php 

#Sign Up Function

if(isset($_POST["btn_signup"])){
    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $password = $_POST["password"];
    $reptpassword = $_POST["reptpassword"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $reptpassword = $_POST["reptpassword"];
    $img_name=$_FILES['img-upload']['name'];
	$tmp_img_name=$_FILES['img-upload']['tmp_name'];
    $folder='profile_img/';
	move_uploaded_file($tmp_img_name,$folder.$img_name);
    $arrayData = array($email,$fname,$lname,$hashedPassword,$img_name );
    $fp = fopen('user_data.csv','a+');
    $input = fputcsv($fp, $arrayData);

    if ($input){
        echo '<div class="alert alert-dismissible alert-success">
                     <button type="button" class="btn-close" data-dismiss="alert"></button>
                     <strong>You successfully register!</strong> <a href="./signin.php" class="alert-link">Sign In Here</a>.
                     </div>';
    }else{
        echo "<h3> Please enter again!</h3>";
    }
    }
    
//SignIn 
if(isset($_POST["btn_signin"])){
    $user = ($_POST['email']);
    $pass = ($_POST['password']);
    if (!strlen($user) || !strlen($pass)){
        die ("Incorrect email or password");
    }
    $state= false;
    $handle = fopen("user_data.csv", "r");
    while (($data = fgetcsv($handle)) !==false){
        if ($data[0] ==$user && password_verify($pass, $data[3])){
            $state = true;
            break;
        }
    }
    fclose($handle);
    if ($state){
        session_start();
        $_SESSION['email']=$data[0];
        $_SESSION['fname']=$data[1];
        $_SESSION['lname']=$data[2];
        $_SESSION['img-upload']=$data[4];
        header('location:account.php');
    } else {
        echo '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="btn-close" data-dismiss="alert"></button>
        <strong>Wrong email or password. Try again!</strong> 
        </div>';
    }
    }

    ?>
