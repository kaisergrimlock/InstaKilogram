<?php 
session_start();
include "sidebar.php";
require "admin_script.php";
if(isset($_GET['email'])){
  $email = $_GET["email"];
}else{
  $email = '';
}

?>
<!DOCTYPE html>
<html lang="en">
        <main>
            <table class="table table-hover text-center">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">Email</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Profile Image</th>
                        <th scope="col">Password</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                if (($handle = fopen('../user/account.db.csv','r'))!== FALSE) {
                    while (($data =  fgetcsv($handle,1000,",")) !== FALSE) {
                        if($data[1] == $email){
                            display_detail($data);
                        }else{
                        echo'';
                        }
                    }
                }else{
                    echo"Error";
                } 
                ?>
                </tbody>
            </table>
        </main>
    </div>
</div>
</html>