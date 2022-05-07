<?php include "sidebar.php";
require "admin_script.php";
$img_id = $_GET['post_img_name'];
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
            if (($handle = fopen('../user/post.csv','r'))!== FALSE){
            while (($data =  fgetcsv($handle,1000,",")) !== FALSE){
                    display_img($data);
            }
        }
    

            ?>
        </tbody>
    </table>
</div>


</section> 

</body>
</html> 