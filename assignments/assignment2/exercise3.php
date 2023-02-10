<?php

$numberOfRows = 1;
$numberOfColumns = 0;

$table = "<table border='1'>";

while($numberOfRows < 16){
    $table .= "<tr>";
    $numberOfColumns = 1;
    while($numberOfColumns < 6){
        $table .= "<td>Row $numberOfRows, Cell $numberOfColumns</td>";
        $numberOfColumns++;
    }
    $numberOfRows++;
    $table .= "</tr>";
}

$table .= "</table>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <title>Excercise1</title>
</head>
<body>
    <p><?php echo $table; ?></p>
</body>
</html>        