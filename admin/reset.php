<?php 
session_start();
include "sidebar.php";
require "admin_script.php";
?>
<div class="container">
    <h2>Reset Password</h2>
    <p><?php echo $_GET['pass']?></p>
    <form enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="resetpsw">Password:</label>
            <input type=text name='reset-psw' id="resetpsw" class="form-control" placeholder="Enter password"><br>
        </div>
        <input type="submit" class="btn btn-danger" name="btn_reset">
        <?php reset_pwd();?>
    </form>
</div>
</div>
</div>

</html>