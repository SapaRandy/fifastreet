<?php
// Démarrage de la session PHP
session_start();

// Inclusion du fichier du modèle
require_once 'model/model.php';

// Définition de la classe du contrôleur
class Controller {
    // Propriété privée pour stocker l'instance du modèle
    private $user;

    // Constructeur de la classe, initialisation du modèle
    public function __construct($pdo) {
        $this->user = new Model($pdo);
    }

    // Méthode pour créer un utilisateur
    public function createUser() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupération des données du formulaire
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $motDePasse = $_POST['motDePasse'];

            // Appel de la méthode du modèle pour créer un utilisateur
            $result = $this->user->createUser($prenom, $nom, $email, $motDePasse);
            if ($result) {
                // Redirection vers la page de connexion en cas de succès
                header("Location: view/login.php");
                exit();
            } else {
                // Message d'erreur en cas d'échec
                $messageErreur = "Une erreur s'est produite lors de la création du compte. Veuillez réessayer.";
            }
        }
    }

    // Méthode pour gérer la connexion de l'utilisateur
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupération des données du formulaire
            $email = $_POST['email'];
            $motDePasse = $_POST['motDePasse'];
            
            // Appel de la méthode du modèle pour authentifier l'utilisateur
            $userId = $this->user->loginUser($email, $motDePasse);
            if ($userId) {
                // Enregistrement de l'adresse e-mail dans la session et redirection vers la page d'accueil
                $_SESSION['email'] = $userId;
                header("Location: view/home.php");
                exit();
            } else {
                // Redirection vers la page de connexion en cas d'échec avec un message d'erreur
                $_SESSION['erreur'] = "Mot de passe incorrect. Veuillez réessayer.";
                header("Location: view/login.php");
                exit();
            }
        }
    }

    // Méthode pour gérer la déconnexion de l'utilisateur
    public function logout() {
        // Destruction de la session et redirection vers la page d'accueil
        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location: view/home.php");
        exit();
    }

    // Méthode pour afficher le profil de l'utilisateur
    public function showProfil() {
        // Récupération des données du profil de l'utilisateur et redirection vers la page du profil
        $prenom = $this->user->getPrenom($_SESSION['email']);
        $nom = $this->user->getNom($_SESSION['email']);
        $_SESSION['prenom'] = $prenom;
        $_SESSION['nom'] = $nom;
        if(isset($_SESSION['prenom'], $_SESSION['nom'])){
            header("Location: view/profil.php");
            exit();
        }
    }

    // Méthode pour mettre à jour le profil de l'utilisateur
    public function updateProfil() {
        if (isset($_POST['prenom'], $_POST['nom'], $_POST['email'])){
            // Récupération des données du formulaire de mise à jour du profil
            $id = $this->user->getId($_SESSION['email']);
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            // Appel de la méthode du modèle pour mettre à jour le profil de l'utilisateur
            $this->user->updateUser($id, $prenom, $nom, $email);
            // Mise à jour des données de session
            $prenom = $this->user->getPrenom($_SESSION['email']);
            $nom = $this->user->getNom($_SESSION['email']);
            $_SESSION['prenom'] = $prenom;
            $_SESSION['nom'] = $nom;
            // Redirection vers la page du profil
            header("Location: view/profil.php");
            exit();
        }
    }
    // Méthode pour créer une réservation
    public function createReservation() {
        if (isset($_POST['date'], $_POST['heure'], $_POST['terrain'])){
            // Récupération des données du formulaire de réservation
            $dateReservation = $_POST['date'];
            $dateActuelle = date('Y-m-d'); // Format : YYYY-MM-DD
            $heureH = date('H');
            $heureActuelle = $heureH . ':00:00';
            $heure = $_POST['heure'];

            // Vérification de la date de réservation
            if ($dateReservation < $dateActuelle) {
                // Redirection vers la page de réservation avec un message d'erreur
                $_SESSION['erreur'] = "Vous ne pouvez pas réserver pour une date antérieure à aujourd'hui.";
                header("Location: view/reservation.php"); 
                exit(); 
            }if(($dateReservation==$dateActuelle)&&($heure<=$heureActuelle)) {
                // Redirection vers la page de réservation avec un message d'erreur
                $_SESSION['erreur'] = "Vous ne pouvez pas réserver pour une heure déjà passée.";
                header("Location: view/reservation.php"); 
                exit();
            }else {
                // Récupération des autres données de réservation
                $terrain = $_POST['terrain'];
                $id = $this->user->getId($_SESSION['email']);
                
                // Vérification de la disponibilité de l'horaire de réservation
                $result = $this->user->checkAvailability($dateReservation, $heure, $terrain);
                if ($result == 0){
                    // Création de la réservation
                    $reserve = $this->user->createReservation($id, $terrain, $dateReservation, $heure);
                    if($reserve){
                        // Redirection vers la page d'accueil en cas de succès
                        header("Location: view/home.php");
                        exit();
                    }
                } else {
                    // Redirection vers la page de réservation avec un message d'erreur
                    $_SESSION['erreur'] = "L'horaire de réservation n'est pas disponible. Veuillez choisir un autre horaire.";
                    header("Location: view/reservation.php");
                    exit();
                }
            }
        }
    }

    // Méthode pour afficher le planning
    public function showPlanning() {
        // Récupération des données de la base de données pour le planning
        $date = $_POST['date'];
        $terrain = $_POST['terrain'];
        $seance = $this->user->getReservationsByDate($date, $terrain);
        
        // Traitement des données pour le planning
        $heures = [];
        for ($i = 0; $i < 24; $i++) {
            $heure = str_pad($i, 2, "0", STR_PAD_LEFT) . ":00:00";
            if($seance){
                if (in_array($heure, $seance)) {
                    $heures[$heure] = "Pris";
                } else {
                    $heures[$heure] = "Disponible";
                }
            } else {
                $heures[$heure] = "Disponible";
            }
        }

        // Conversion des données du planning en chaîne JSON pour l'URL
        $heures_encoded = urlencode(json_encode($heures));

        // Redirection vers la page du planning avec les données en paramètres GET
        header("Location: http://localhost/FifaStreet/view/planning.php?date=$date&terrain=$terrain&heures=$heures_encoded");
        exit;
    }

    //fonction qui permet de récupérer les réservations du client
    public function myReservations() {
        $id = $this->user->getId($_SESSION['email']);
        $reservations = $this->user->getReservationsById($id);
        foreach($reservations as &$reservation) {
            $terrainId = $reservation['id_terrain'];
            $terrainName = $this->user->getTerrainNameById($terrainId);
            $reservation['terrain_name'] = $terrainName;
        }
        $_SESSION['reservations'] = $reservations;
        header("Location: view/myReservation.php");
        exit;
    }
}

?>