<?php 
session_start();
include "sidebar.php";
require "admin_script.php";
if(!isset($_SESSION['admin'])){
    header('location: signin.php');
}else{
?>
<!-- DISPLAY USERS -->

        <section>
            <table class="table table-hover text-center">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">No</th>
                        <th scope="col">Email</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">RegisterDate</th>
                        <th scope="col">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php display_table()?>
                </tbody>
            </table>
        </section>
    </div>
</div>
</html>
<?php
}?>