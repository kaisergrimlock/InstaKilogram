<?php 

#Sign Up Function
$msg="";

if(isset($_POST["btn_signup"])){
    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $password = $_POST["password"];
    
    // password validation
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
   
    if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
      $msg = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
      return false;
    } else {
      $msg = "Your password is strong.";
      
    }
    if ($_POST["password"] === $_POST["reptpassword"]) {
        // success!
     }
     else {
        return false;
     }
  
    $reptpassword = $_POST["reptpassword"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $reptpassword = $_POST["reptpassword"];
    $img_name=$_FILES['img-upload']['name'];
	$tmp_img_name=$_FILES['img-upload']['tmp_name'];
    $folder='profile_img/';
	move_uploaded_file($tmp_img_name,$folder.$img_name);
    $arrayData = array($email,$fname,$lname,$hashedPassword,$img_name );
    $fp = fopen('user_data.csv','a+');
    
    //  checking duplicate email
    $csv = array_map('str_getcsv', file('user_data.csv'));
    
    foreach($csv as $line){
    if($line[0] == $email){
       return false;
    }
    }
    
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
    $var = '';
    echo formatDuplicateExtension($post_img_name);
    echo($post_img_name);
    if (file_exists("/InstaKilogram/user/img_post/" . $post_img_name))
    {
     echo("file already exsits");
      // its new location and hashing the filename only.
     $post_img_name=($post_img_name);   
     // store your renamed file here in your database
     // using the assigned $var variable.
    }
    move_uploaded_file($tmp_img_name, $folder.$post_img_name);
    $arrayPostData = array($text_post,$post_img_name,$privacy, $email_post, $date);
    $fp = fopen('post.csv','a+');
    $input = fputcsv($fp, $arrayPostData);
    header("Refresh:0");
}


function formatDuplicateExtension($filename){
    $stmt = NULL;
    $format = explode('.', $filename);
    $i = 0;
    foreach($format as $key => $value){     
        if($value === end($format)){
            $stmt .= '(1).'.$format[$i];
        }elseif($key === count($format)-2){
            $stmt .= $format[$i];
        }else{
            $stmt .= $format[$i].'.';
        }
    $i++;     
    }
return $stmt;
}



#Display Posted Image Account
function post_image(){
    $email_current = $_SESSION['email'];
    if (($handle = fopen('../user/post.csv','r'))!== FALSE) {
        while (($data =  fgetcsv($handle,1000,",")) !== FALSE) {
            if ($data[3] == $email_current){
                    display_img($data);
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
    $email_current = $_SESSION['email'];
    if (($handle = fopen('../user/post.csv','r'))!== FALSE){
        
        if(isset($_SESSION['email'])){
            while (($data =  fgetcsv($handle,1000,",")) !== FALSE){
                if($data[2] == 'public' || $data[2] == 'internal'){
                    display_img($data);
                }
                if(($data[3] == $email_current) && ($data[2] == 'private')){
                    display_img($data);
                }
            }
        }
        else{
            while (($data =  fgetcsv($handle,1000,",")) !== FALSE){
                if($data[2]== 'public'){
                    display_img($data);
                }
            }
        }
    }
}

#Function to display images
function display_img($array){
    echo '<div class="card mb-3">';
    echo '<h3 class="card-header">'.$array[0].'</h3>';
    echo '<div class="card-body">';
    echo '<h6 class="card-title text-info">' .$array[3]. '</h6>';
    echo '<p class="card-subtitle text-muted"> '.$array[4].'</>';
    echo '<h6> <em>'.$array[2].'</em> </h6>';
    echo '</div>';
    echo '<img src="./img_post/'.$array[1].'" width="40%"></img>';
    echo '</div> ';
}
    ?>