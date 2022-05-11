<?php include "sidebar.php";
require "admin_script.php";
?>


<br>
<div>
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
</div>


</section> 

</body>
</html> 