<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body>
<?php include ('../bootstrap.php'); ?>
    <div class="content-header">
        <h1>Dashboard</h1>
    </div>
    <section class="content">
        <div class="info-section">
            <h2>Weekly Summary</h2>
            <div class="row">
                <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                    <div class="card-header">Weekly users</div>
                    <div class="card-body">
                      <h4 class="card-title">150</h4>
                      <p class="card-text">6% increase</p>
                    </div>
                </div>

                <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                    <div class="card-header">Weekly registers</div>
                    <div class="card-body">
                      <h4 class="card-title">100</h4>
                      <p class="card-text">5% increase</p>
                    </div>
                </div>

                <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                    <div class="card-header">Weekly logins</div>
                    <div class="card-body">
                      <h4 class="card-title">345</h4>
                      <p class="card-text">10% increase</p>
                    </div>
                </div>

                <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                    <div class="card-header">Weekly visitors</div>
                    <div class="card-body">
                      <h4 class="card-title">9086</h4>
                      <p class="card-text">20% increase</p>
                    </div>
                </div>
            <div class="row">
        </div>
        <div>
            <h2>Number of Users</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
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
        <div class="analytics">
            <div id="user_analytics">
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

    </section>
</body>
</html> 