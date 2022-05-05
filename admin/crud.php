<?php include "sidebar.php";
require "admin_script.php";?>

<!-- SEARCH USERS -->
<form action="search.php" method="POST">
        <div class="row mx-3">
            <div class="col-11">
                <input class="form-control me-sm-2" name="search" type="text" placeholder="Search User">  
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
                <th scope="col">No</th>
                <th scope="col">Email</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                 <th scope="col">Details</th>
            </tr>
        </thead>
        <tbody>
            <?php display_table()?>
        </tbody>
    </table>
</div>


</section> 

</body>
</html> 