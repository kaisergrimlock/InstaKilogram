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
        $_SESSION['post-upload']=$data[5];
        header('location:account.php');
    } else {
        echo '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="btn-close" data-dismiss="alert"></button>
        <strong>Wrong email or password. Try again!</strong> 
        </div>';
    }
    }

#Post Image & Message Function
if(isset($_POST["btn_upload_post"])){
    $text_post = $_POST["text_post"];
    $email_post = $_SESSION['email'];
    $privacy = $_POST["privacy"];
    $date = date('d-m-y h:i:s');
    $post_img_name=$_FILES['post-upload']['name'];
	$tmp_img_name=$_FILES['post-upload']['tmp_name'];
    $folder = 'img_post/';
    move_uploaded_file($tmp_img_name, $folder.$post_img_name);
    $arrayPostData = array($text_post,$post_img_name,$privacy, $email_post, $date);
    $fp = fopen('post.csv','a+');
    $input = fputcsv($fp, $arrayPostData);
}

#Display Posted Image Account
function post_image(){
    $email_current = $_SESSION['email'];
    if (($handle = fopen('../user/post.csv','r'))!== FALSE) {
        $row = 1;
        while (($data =  fgetcsv($handle,1000,",")) !== FALSE) {
            if ($data[3] == $email_current){
                echo '<img class="img-fluid rounded shadow-sm d-block" src="./img_post/'.$data[1].'" alt="post images" >';
            }
            else{
                echo '';
            } 
        }
    }else{
        echo"Error";
    }
}

#Display Posted Image Feed
function post_image_feed(){
    if (($handle = fopen('../user/post.csv','r'))!== FALSE) {
        $row = 1;
        while (($data =  fgetcsv($handle,1000,",")) !== FALSE) {
                if ($data[2] == 'public'){
            echo '<div class="card mb-3">';
            echo '<h3 class="card-header">'.$data[0].'</h3>';
            echo '<div class="card-body">';
            echo '<h6 class="card-title text-info">' .$data[3]. '</h6>';
            echo '<p class="card-subtitle text-muted"> '.$data[4].'</>';
            echo '<h6> <em>'.$data[2].'</em> </h6>';
            echo '</div>';
            echo '<img src="./img_post/'.$data[1].'" width="40%"></img>';
            echo '</div> ';
                }
        }
    }else{
        echo"Error";
    }
}
    ?>