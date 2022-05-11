<?php 
session_start();
include "sidebar.php";
require "admin_script.php";
if(!isset($_SESSION['admin'])){
    header('location: signin.php');
}else{
?>

<!-- SEARCH USERS -->
<form action="search.php" method="POST">
    <div class="row mx-3">
        <div class="col-11">
            <form action="search.php" method="POST">
                <input class="form-control me-sm-2" name="search" type="text" placeholder="Search User">
            </form>
        </div>
        <div class="col-1">
            <button class="btn btn-info" type="submit">Search</button>
        </div>
    </div>
</form>
<br>
<div>
    <table class="table table-hover text-center">
        <thead>
            <tr class="table-dark">
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">Email</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">RegisterDate</th>
                    <th scope="col">Details</th>
                </thead>
        <tbody>
            <?php search_user()?>
        </tbody>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
<?php
}?>
</section>
</body>

</html>