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
<div>
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
            if (($handle = fopen('../user/account.csv','r'))!== FALSE) {
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
</div>
<!-- The Modal Post Image-->
<div class="modal" id="resetPassword">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Reset Password</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form enctype="multipart/form-data" method="post" action="">
                    <input type=text name='reset-psw' class="form-control"> </input> <?php reset_pwd($data);
                    ?>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="submit" class="btn btn-danger pull-right" name="btn_reset">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


</section>

</body>

</html>