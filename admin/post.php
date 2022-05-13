<?php 
session_start();
include "sidebar.php";
require "admin_script.php";
if(!isset($_SESSION['admin'])){
    //header('location: signin.php');
    echo("<script>location.href = 'signin.php';</script>");
}else{
?>
<main>
    <table class="table table-hover text-center">
        <thead>
            <tr class="table-dark">
                <th scope="col">Caption</th>
                <th scope="col">User</th>
                <th scope="col">Image</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                        post_image_feed();
                        delete();
                    ?>
        </tbody>
    </table>
</main>
</div>
</div>

</html>
<?php
}?>