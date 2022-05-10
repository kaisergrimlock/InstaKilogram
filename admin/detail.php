<?php include "sidebar.php";
require "admin_script.php";
$email = $_GET["email"];

?>

<!-- EDIT FUNCTION -->
<div class="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<br>
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
            if($data[1] == $_GET["email"]){
                display_detail($data);
            }         
        }
    }else{
        echo"Error";
    } 
            ?>
        </tbody>
    </table>
</div>


</section> 

</body>
</html> 