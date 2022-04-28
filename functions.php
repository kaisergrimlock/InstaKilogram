<?php
function readcsv($filename) {
    $handle = fopen($filename, "r");
    echo '<div class="table-responsive"><table class="table table-sm table-striped table-bordered table-hover">';
    //display header row if true
    $csvcontents = fgetcsv($handle);
    echo '<tr>';
    foreach ($csvcontents as $headercolumn) {
        echo "<th>$headercolumn</th>";
    }
    echo '</tr>';
    // displaying contents
    while ($csvcontents = fgetcsv($handle)) {
        echo '<tr>';
        foreach ($csvcontents as $column) {
            echo "<td>$column</td>";
        }
        echo '</tr>';
    }
    echo '</table>';
    fclose($handle);
    }