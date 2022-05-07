<?php include "sidebar.php"?>

<!-- ADMIN DASHBOARD -->
<div id="section-dashboard" class="tab-content">
    <div class="">
        <h2>Weekly Summary</h2>
        <div class="row">
            <div class="card border-primary mb-3">
                <div class="card-header">Weekly users</div>
                <div class="card-body">
                    <h4 class="card-title">150</h4>
                    <p class="card-text">6% increase</p>
                </div>
            </div>
            <div class="card border-warning mb-3">
                <div class="card-header">Weekly registers</div>
                <div class="card-body">
                    <h4 class="card-title">100</h4>
                    <p class="card-text">5% increase</p>
                </div>
            </div>
            <div class="card border-success mb-3">
                <div class="card-header">Weekly logins</div>
                <div class="card-body">
                    <h4 class="card-title">345</h4>
                    <p class="card-text">10% increase</p>
                </div>
            </div>
            <div class="card border-danger mb-3">
                <div class="card-header">Weekly visitors</div>
                <div class="card-body">
                    <h4 class="card-title">9086</h4>
                    <p class="card-text">20% increase</p>
                </div>
            </div> 
        </div>
    </div>
    <div>
    <h2>Number of Users</h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (($handle = fopen('../user/account.csv','r'))!== FALSE) {

                while (($data =  fgetcsv($handle,1000,",")) !== FALSE) {
                    echo "<tr>";
                    echo '<td scope="row">'.$data[0].'</td>';
                    echo '<td scope="row">'.$data[1].'</td>';
                    echo"</tr>";
                }
            }else{
                echo"Error";
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Analytics -->
<div>
     <h2>Analytics</h2>
     <div div class="card border-secondary mb-3">
         <div class="card-header">User Overview</div>
         <div class="card-body">
             <canvas height="200" id="user_chart">chart here</canvas>
            </div>
        </div>
        <div div class="card border-secondary mb-3">
            <div class="card-header">Visitors Overview</div>
            <div class="card-body">
                <canvas height="200" id="visitor_chart"> chart here</canvas>
            </div>
        </div>
    </div>
</div> 

