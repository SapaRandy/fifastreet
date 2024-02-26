<?php 
    require_once 'controller/controller.php';
    
    $action = isset($_GET['action']) ? $_GET['action'] : 'home';

    // Créer une instance du contrôleur approprié en fonction de l'action demandée
    switch ($action) {
        case 'traiterCreation':
            $userController = new Controller($pdo);
            $userController->createUser();
            break;
        case 'traiterConnexion':
            $userController = new Controller($pdo);
            $userController->login();
            break;
        case 'deconnexion':
            $userController = new Controller($pdo);
            $userController->logout();
            break;
        case 'profil':
            $userController = new Controller($pdo);
            $userController->showProfil();
            break;
        case 'modifProfil':
            $userController = new Controller($pdo);
            $userController->updateProfil();
            break;
        case 'createReservation':
            $userController = new Controller($pdo);
            $userController->createReservation();
            break;
        case 'showPlanning':
            $userController = new Controller($pdo);
            $userController->showPlanning();
            break;
        case 'myReservations':
            $userController = new Controller($pdo);
            $userController->myReservations();
            break;
        default:
            break;
    }
    
?>