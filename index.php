<?php

session_start();

include_once("./models/data.php");


if (!isset($_REQUEST['uc'])) { //"!isset" si cest pas vrai...  ( empty() )
    $uc = 'connection';	
}else {
	$uc = $_REQUEST['uc'];
}

$pdo =  PdoUser::getPdoUser();

switch ($uc)   					
{
    case 'connection': // le case cest la valeur attribuer a uc=..
        include("views/connection.php");
    break;
    
    case 'create':
        include("views/createAccount.php");
    break;
    
    case 'admin':
        include("controllers/userController.php");
    break;
    
    case 'logout':
        session_destroy();
        header("Location: connection");
    break;

    default:
        include("view/connection.php");
    break;
}