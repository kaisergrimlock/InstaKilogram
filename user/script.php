<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');


#Sign Up Function
$msg="";

if(isset($_POST["btn_signup"])){
    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $password = $_POST["password"];
    $redate = date('d-m-y h:i:s');
    // password validation
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    //fname, lname validation
    if((strlen($lname) < 2  || strlen($lname)>20) || (strlen($fname) < 2  || strlen($fname) > 20)){
         echo '<div class="alert alert-dismissible alert-danger">
                     <button type="button" class="btn-close" data-dismiss="alert"></button>
                     <strong> Name must be more than 2 characters and less than 20 characters.</strong>
                     </div>';
                     return false;
    }

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

    //verify image extension & image name
    $img_name=$_FILES['img-upload']['name'];
    $tmp_img_name=$_FILES['img-upload']['tmp_name'];
    $allowed_extension = array("jpeg", "jpg", "png", "gif");
    $file_extension = pathinfo($img_name, PATHINFO_EXTENSION);

    if (!in_array($file_extension, $allowed_extension)){
        echo '<div class="alert alert-dismissible alert-danger">
                     <button type="button" class="btn-close" data-dismiss="alert"></button>
                     <strong>You are allowed with only jpg/jpeg, png and gif.</strong>
                     </div>';
                     return false;
    } 
    if (file_exists("../user/profile_img/" . $img_name))
    {
     $img_name=formatDuplicateExtension($img_name);   
    }
    $folder='profile_img/';
	move_uploaded_file($tmp_img_name,$folder.$img_name);
    
    $fp = fopen('../../../account.db.csv','a+');
        //Add row
    $row = count(file("../../../account.db.csv"));
    if($row > 1)
    {
        $row = ($row - 1) + 1;
    }
     $arrayData = array(
        'No' => $row, 
        'Email' => $email,
        'FirstName' => $fname,
        'LastName' => $lname, 
        'RegisterDate' => $redate, 
        'HashedPassword' => $hashedPassword,
        'Profilemage' => $img_name );
    
    //  checking duplicate email
    $csv = array_map('str_getcsv', file('../../../account.db.csv'));
    $lower_email = strtolower($email);
    
    foreach($csv as $line){
        if(strtolower($line[1]) == $email){
            echo '<div class="alert alert-dismissible alert-danger">
                     <button type="button" class="btn-close" data-dismiss="alert"></button>
                     <strong>This email has been used.</strong>Please use different one
                     </div>';
        return false;
        }
    }

    //Insert data to csv
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
    #SignIn 
    if(isset($_POST["btn_signin"])){
        $user = ($_POST['email']);
        $pass = ($_POST['password']);
        if (!strlen($user) || !strlen($pass)){
            die ("Incorrect email or password");
        }
        $state= false;
        $handle = fopen("../../../account.db.csv", "r");
        while (($data = fgetcsv($handle)) !==false){
            if ($data[1] ==$user && password_verify($pass, $data[5])){
                $state = true;
                break;
            }
        }
        fclose($handle);
        if ($state){
            session_start();
            $_SESSION['email']=$data[1];
            $_SESSION['fname']=$data[2];
            $_SESSION['lname']=$data[3];
            $_SESSION['redate']=$data[4];
            $_SESSION['img-upload']=$data[6];
            $_SESSION['post-upload']=$data[7];
            echo("<script>location.href = 'account.php';</script>");
        } else {
            echo '<div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-dismiss="alert"></button>
            <strong>Wrong email or password. Try again!</strong> 
            </div>';
        }
    }

 #Replace Profile Image
 if(isset($_POST["replace_submit"])){
    $img = " ";
    $email = $_SESSION['email'];
    if (($handle = fopen('../../../account.db.csv','r'))!== FALSE){
        while (($data =  fgetcsv($handle,1000,",")) !== FALSE) {
            if ($data[1] == $email){
                    $img = $data[6];
                    
            }
        }
    }
    $img_name = $img;
    $img_name=$_FILES['replace_image']['name'];
	$tmp_img_name=$_FILES['replace_image']['tmp_name'];
    $img_name = $img;
    unlink('../user/profile_img/'.$img);
    $folder='profile_img/';
	move_uploaded_file($tmp_img_name,$folder.$img_name);
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
    $allowed_extension = array("jpeg", "jpg", "png", "gif");
   
    if (!in_array(pathinfo($post_img_name, PATHINFO_EXTENSION), $allowed_extension)){
        echo '<div class="alert alert-dismissible alert-danger">
                     <button type="button" class="btn-close" data-dismiss="alert"></button>
                     <strong>You are allowed with only jpg/jpeg, png and gif.</strong>
                     </div>';
                     return false;
    } 
    if (file_exists("../user/img_post/" . $post_img_name))
    {
     $post_img_name=formatDuplicateExtension($post_img_name);   
    }
    move_uploaded_file($tmp_img_name, $folder.$post_img_name);
    $arrayPostData = array($text_post,$post_img_name,$privacy, $email_post, $date);
    $fp = fopen('../../../post.csv','a+');
    $input = fputcsv($fp, $arrayPostData);
    header("Refresh:0");
}


#Unique Image Name Function (Somewhat)
function formatDuplicateExtension($filename){
    $stmt = NULL;
    $format = explode('.', $filename);
    $i = 0;
    foreach($format as $key => $value){     
        if($value === end($format)){
            $stmt .= '('.rand(0,99999).').'.$format[$i];
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
    $array = csvToArray('../../../post.csv');
    usort($array, 'mysort');
    array2csv($array, '../../../post.csv');
    $email_current = $_SESSION['email'];
    if (($handle = fopen('../../../post.csv','r'))!== FALSE) {
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
#Replace Profile Image


#Display Posted Image Feed
function post_image_feed(){
    $array = csvToArray('../../../post.csv');
    usort($array, 'mysort');
    if(isset( $_SESSION['email'])){
        $email_current = $_SESSION['email'];
    }
    else{
        $email_current = '';
    }
    if (($handle = fopen('../../../post.csv','r'))!== FALSE){
        
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
    echo '<div class="card mb-3 mt-3 mx-3">';
    if($array[0] != NULL){
        echo '<h3 class="card-header">'.$array[0].'</h3>';
    }else{
        '<h3 class="card-header">No description</h3>';
    }
    echo '<div class="card-body">';
    echo '<h6 class="card-title text-info">' .$array[3]. '</h6>';
    echo '<p class="card-subtitle text-muted"> '.$array[4].'</p>';
    echo '<h6> <em>'.$array[2].'</em> </h6>';
    echo '</div>';
    echo '<img class="sharedImages" src="./img_post/'.$array[1].'" width="500" alt="sharedimages"/>';
    echo '</div> ';
} 


#Sort CSV
//sort function
function mysort($p1, $p2){
    return strtotime($p2[4]) - strtotime($p1[4]);
}

function csvToArray($csvFile){
    $handle = fopen($csvFile, "r");
    while (($data = fgetcsv($handle)) !==false){
        if(array(null) !== $data)
        {
            $lines[] = $data;
        }
    }
    return $lines;
}

//convert array to csv
function array2csv($data, $newdata, $delimiter = ',', $enclosure = '"'){
    $file = fopen($newdata, 'w+');
    foreach ($data as $data_line) {
        fputcsv($file, $data_line, $delimiter, $enclosure);
    }

    $data_read="";
    rewind($file);
    //read CSV
    while (!feof($file)) {
        $data_read .= fread($file, 8192); // will return a string of all data separeted by commas.
    }
    fclose($file);
}




?>