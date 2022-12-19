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
    case 'connection': // le case cest la valeur attribuer a Action=..
        include("view/connection.php");
    break;
    
    case 'create':
        include("view/createAccount.php");
    break;
    
    case 'admin':
        include("controllers/userController.php");
    break;
    
    default:
        include("view/connection.php");
    break;
}