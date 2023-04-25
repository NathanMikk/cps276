<?php
//okay so need an if statment here if admin than the path and HTML is different
//than that of staff
//the default path for login should be put here?

$path = "index.php?page=login";

$nav=<<<HTML
    <nav>
        <ul> 
            <li><a href="index.php?page=addContact">Add Contact</a></li>
            <li><a href="index.php?page=deleteContacts">Delete Contact(s)</a></li>
            <li><a href="index.php?page=addAdmin">Add Admin</a></li>
            <li><a href="index.php?page=deleteAdmins">Delete Admin(s)</a></li>
            <li><a href="index.php?page=logout">Logout</a></li>
        </ul>
        <style>
            ul li {display: inline;
                margin-right: 20px;}
        </style>
    </nav>
HTML;

if(isset($_GET)){
    if($_GET['page'] === "addContact"){
        require_once('pages/addContact.php');
        $result = init();
    }

    else if($_GET['page'] === "deleteContacts"){
        require_once('pages/deleteContacts.php');
        $result = init();
    }

    else if($_GET['page'] === "welcome"){
        require_once('pages/welcome.php');
        $result = init();
    }

    else if($_GET['page'] === "addAdmin"){
        require_once('pages/addAdmin.php');
        $result = init();
    }

    else if($_GET['page'] === "deleteAdmins"){
        require_once('pages/deleteAdmins.php');
        $result = init();
    }
    
    else if($_GET['page'] === "logout"){
        require_once('pages/login.php');
        $result = init();
        $nav = '';
    }

    else if($_GET['page'] === "login"){
        require_once('pages/login.php');
        $result = init();
    }

    else {
        header('location: '.$path);
    }
}

else {
    header('location: '.$path);
}


?>