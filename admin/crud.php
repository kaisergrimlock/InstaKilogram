<?php include "sidebar.php"?>

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
                <th scope="col">Password</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (($handle = fopen('../user/user_data.csv','r'))!== FALSE) {
                $row = 1;
                while (($data =  fgetcsv($handle,1000,",")) !== FALSE) {
                    echo "<tr>";
                    echo '<td scope="row">'.$row++.'</td>';
                    echo '<td scope="row">'.$data[0].'</td>';
                    echo '<td scope="row">'.$data[1]."</td>";
                    echo '<td scope="row">'.$data[2]."</td>";
                    echo '<td scope="row">'.$data[3]."</td>";
                    echo"</tr>";
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