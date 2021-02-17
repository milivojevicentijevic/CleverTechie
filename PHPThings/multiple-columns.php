<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorta</title>
</head>
<body>
<?php
    $max_columns= 5;
    $data = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
?>
    <table>
    <?php
        $record_id = 0;
        while(true) {  // create rows until out of records to display
            for ($col = 1; $col <= $max_columns; $col++) {
                // stop loop when there is no more data available
                if (!isset($data[$record_id])) {
                    return;
                }
                if ($col == 1) {
                    echo "<tr>";
                }
                ?>
                <td valign="top" bgcolor="lightblue" width="50px" height="50px"><?php echo $record_id; ?></td>
                <?php
                if ($col == $max_columns) {
                    echo "</tr>";
                }
                $record_id++;
            }
        }
    ?>
    </table>
</body>
</html>