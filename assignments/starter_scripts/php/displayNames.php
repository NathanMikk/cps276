<?php

require_once "../classes/Pdo_methods.php";

$pdo = new PdoMethods();

$sql = "SELECT name FROM names ORDER BY name ASC";

$results = $pdo->selectNotBinded($sql);

if($results === 'error'){
    $response = (object)[
        'masterstatus' => 'error',
        'msg' => "could not get names."
    ];

    echo json_encode($response);

} else{
    $list = "";
    foreach($results as $name)
    {
        $list .= '<p>'.implode($name).'</p>';
    }

    $response = (object)[
        'masterstatus' => 'success',
        'names' => $list
    ];

    echo json_encode($response);

}

?>