<?php

$action = $_REQUEST['action'];

switch ($action)
{
    case 'control': //le case cest la valeur attribuer a Action=..
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $user = $pdo->login($email, $password);
        if ($user == 0) {    
            printf("User not found.");
        } else {
            $_SESSION['admin'] = $email;
            // printf("User found!!!");
            
            $users = $pdo->getUsers();
            include("view/home.php");
        }
    break;

    case 'createAdmin':
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $user = $pdo->createAdmin($email, $password);
        header("Location: connection");
    break;
    
    case 'createUser':
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $firstName = $_REQUEST['firstName'];
        $lastName = $_REQUEST['lastName'];
        $adress = $_REQUEST['adress'];
        $postalCode = $_REQUEST['postalCode'];
        $city = $_REQUEST['city'];
        $user = $pdo->createUser($email, $password, $firstName, $lastName, $adress, $postalCode, $city);
        header("Location: home");
    break;
    
    case 'home':
        $users = $pdo->getUsers();
        include("view/home.php");
    break;

    case 'delete':
        
        $id = intval($_GET['id']);
        $delete = $pdo->deleteUser($id);
        header("Location:home");
        // include("view/home.php");
    break;
    
    case 'update':
        
        $id = intval($_GET['id']);
        $firstName = $_REQUEST['firstName'];
        $lastName = $_REQUEST['lastName'];
        $adress = $_REQUEST['adress'];
        $postalCode = $_REQUEST['postalCode'];
        $city = $_REQUEST['city'];
        
        $res = $pdo->updateUser($firstName, $lastName, $adress, $postalCode, $city, $id);

        header("Location: home");

        break;
        
    default:
        include("view/connection.php");
    break;
}

?>