<?php
$error = '';
$email = '';
$fname = '';
$lname = '';
$password = '';
$reptpassword = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

#Sign Up Function
if(isset($_POST["btn_signup"])){
    if(empty($_POST["email"]))
    {
        $error .= '<p><label class="alert alert-dismissible alert-danger"> Please Enter your email!</label></p>';
    } else
    { 
        $email = clean_text($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $error .= '<p><label class="alert alert-dismissible alert-danger">Invalid email format</label></p>';
            }
    }
    if(empty($_POST["fname"]))
    {
        $error .= '<p><label class="alert alert-dismissible alert-danger">Please Enter your First Name</label></p>';
    } else
    {
        $fname = clean_text($_POST["fname"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$fname))
            {
                $error .= '<p><label class="alert alert-dismissible alert-danger">Only letters and white space allowed</label></p>';
            }
    if(empty($_POST["lname"]))
    {
        $error .= '<p><label class="alert alert-dismissible alert-danger">Please Enter your Last Name</label></p>';
    } else
    {
        $lname = clean_text($_POST["lname"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$lname))
            {
                $error .= '<p><label class="alert alert-dismissible alert-danger">Only letters and white space allowed</label></p>';
            }
        }
    if(empty($_POST["password"]))
    {
        $error .= '<p><label class="alert alert-dismissible alert-danger">Password is required</label></p>';
    } else
    {
        $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
    }
    if(empty($_POST["reptpassword"]))
    {
        $error .= '<p><label class="alert alert-dismissible alert-danger">Retype your password is required</label></p>';
    } 
    if (!password_verify($_POST["reptpassword"], $hashedPassword)) {
        echo 'Invalid password.';
    }
}
    // if ($_POST["password"] !== $_POST["reptpassword"]) 
    // {
    //     $error .= '<p><label class="alert alert-dismissible alert-danger">Your passwords did not match</label></p>';
    //  }
    // }

    if($error == '')
    {
        $file_open = fopen("contact_data.csv", "a");
        $no_rows = count(file("contact_data.csv"));
            if($no_rows > 1)
            {
                $no_rows = ($no_rows - 1) + 1;
            }
                $form_data = array(
                'sr_no'  => $no_rows,
                'email'  => $email,
                'fname'  => $fname,
                'lname'  => $lname,
                'password' => $hashedPassword,
            );
            fputcsv($file_open, $form_data);
            $error = '<div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-dismiss="alert"></button>
            <strong>You successfully register!</strong> <a href="./signin.php" class="alert-link">Sign In Here</a>.
            </div>';
            $email = '';
            $fname = '';
            $lname = '';
            $hashedPassword = '';
            }

}

function check_credentials_from_file() {
    if (($handle = fopen("contact_data.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
             if ($_POST["email"] === $data[1] && password_verify($_POST["password"], $data[4]) )
            $url = "account.php";
            header("Location:".$url);
        }
        
}
}

function get_credentials_from_file() {
    if (($handle = fopen("contact_data.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            var_dump($data[1]);
            
        }
        
}
    
}

if(isset($_POST["btn_signin"])){
    check_credentials_from_file();
}