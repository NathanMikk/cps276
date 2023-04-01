<?php

require_once "../classes/Pdo_methods.php";
$pdo = new PdoMethods();

$data = json_decode($_POST['data']);

//$name is an array should be able to just reference location of first and last name in order to reverse

$name = $data->name;
$seperateName = explode(" ", $name);
$reverseName = "{$seperateName[1]}, {$seperateName[0]}";

$sql = "INSERT INTO names (name) VALUES (:name)";

$bindings = [
    [':name', $reverseName, 'str'],
];

$results = $pdo->otherBinded($sql, $bindings);

//use this if/else statement for all 3 buttons
if($results === 'error'){
    $response = (object)[
        'masterstatus' => 'error',
        'msg' => "could not add name to database"
    ];

    echo json_encode($response);

} else{
    $response = (object)[
        'masterstatus' => 'success',
        'msg' => "name added"
    ];

    echo json_encode($response);

}

?>