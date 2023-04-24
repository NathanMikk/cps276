<?php

//$path = "index.php?page=welcome";
$path = "index.php?page=login";

$nav=<<<HTML
    <nav>
        <ul>
        <!--
            index.php?page=login (login page)
            index.php?page=welcome (welcome page)
            index.php?page=addContact (add contact page)
            index.php?page=deleteContacts (delete contacts page)
            index.php?page=addAdmin (add admin page)
            index.php?page=deleteAdmins (delete admins page)
        -->
            <li><a href="index.php?page=welcome">Welcome</a></li> 
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
        require_once('assignment10/logout.php');
        $result = init();
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