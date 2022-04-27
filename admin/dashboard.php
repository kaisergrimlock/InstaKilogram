<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/admin/style.css">
    <script defer src="../header.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <header id="app-header"></header>
    <div class="content-header">
        <h1>Dashboard</h1>
    </div>
    <section class="content">
        <div class="info-section">
            <h2>User List</h2>

            <?php
            $row = 1;
            if (($handle = fopen("sites/default/files/Bok1.csv", "r")) !== FALSE) {
            
                echo '<table border="1">';
            
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    $num = count($data);
                    if ($row == 1) {
                        echo '<thead><tr>';
                    }else{
                        echo '<tr>';
                    }
                
                    for ($c=0; $c < $num; $c++) {
                        //echo $data[$c] . "<br />\n";
                        if(empty($data[$c])) {
                        $value = "&nbsp;";
                        }else{
                        $value = $data[$c];
                        }
                        if ($row == 1) {
                            echo '<th>'.$value.'</th>';
                        }else{
                            echo '<td>'.$value.'</td>';
                        }
                    }
                
                    if ($row == 1) {
                        echo '</tr></thead><tbody>';
                    }else{
                        echo '</tr>';
                    }
                    $row++;
                }
            
                echo '</tbody></table>';
                fclose($handle);
            }
            ?>
        </div>
    </section>
</body>
</html> 