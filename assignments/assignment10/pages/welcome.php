<?php

function init(){
    security();
    $name = $_SESSION['name'];
    return ["<h1>Welcome</h1>","<p>Welcome $name.  Click one of the links above.</p>",""];
}

?>