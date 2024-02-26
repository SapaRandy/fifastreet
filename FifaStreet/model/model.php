<?php

// Inclure le fichier de configuration
require_once 'config.php';

// Définition de la classe Model
class Model{
    private $pdo;

    // Constructeur de la classe, prend une connexion PDO en paramètre
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Méthode pour créer un utilisateur
    public function createUser($prenom, $nom , $email , $motDePasse) {
        // Hachage du mot de passe
        $hashedPassword = password_hash($motDePasse, PASSWORD_DEFAULT);

        // Requête SQL pour insérer un nouvel utilisateur
        $sql = "INSERT INTO client (prenom, nom , email, password) VALUES (? , ? , ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1, $prenom);
        $statement->bindParam(2, $nom);
        $statement->bindParam(3, $email);
        $statement->bindParam(4, $hashedPassword);

        // Exécution de la requête
        $result = $statement->execute();
        $statement->closeCursor();

        return $result;
    }

    // Méthode pour connecter un utilisateur
    public function loginUser($email, $password){
        // Requête SQL pour récupérer l'utilisateur correspondant à l'email fourni
        $sql = "SELECT * FROM client WHERE email = :email";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$email]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        // Vérification du mot de passe
        if (password_verify($password, $user['password'])) {
            return $user['email'];
        } else {
            return false;
        }
    }

    // Méthode pour obtenir l'ID d'un utilisateur par son email
    public function getId($email) {
        $sql = "SELECT * FROM client WHERE email = :email";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$email]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user['id'];
        
    }
    
    // Méthode pour obtenir le prénom d'un utilisateur par son email
    public function getPrenom($email) {
        $sql = "SELECT * FROM client WHERE email = :email";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$email]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user['prenom'];
    }

    // Méthode pour obtenir le nom d'un utilisateur par son email
    public function getNom($email) {
        $sql = "SELECT * FROM client WHERE email = :email";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$email]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user['nom'];
    }

    //Methode pour obtenir le nom du terrain
    public function getTerrainNameById($idTerrain) {
        $sql = "SELECT nom FROM terrain WHERE id = :idTerrain";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$idTerrain]);
        $terrain = $statement->fetch(PDO::FETCH_ASSOC);
        return $terrain["nom"];
    }
    
    // Méthode pour mettre à jour les informations d'un utilisateur
    public function updateUser($userId,$prenom, $nom, $email) {
        $sql = "UPDATE client SET prenom = :prenom, nom = :nom ,email = :email WHERE id = :userId";
        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute(array(':prenom' => $prenom,':nom' => $nom, ':email' => $email, ':userId' => $userId));
        return $result; 
    }
    
    // Méthode pour créer une réservation
    public function createReservation($idClient,$terrain,$dateReservation,$heure){
        $sql = "INSERT INTO reservation (id_client,id_terrain,date_reservation,heure) VALUES (?,?,?,?)";
        $statement = $this->pdo-> prepare($sql);
        $statement->bindParam(1, $idClient);
        $statement->bindParam(2, $terrain);
        $statement->bindParam(3, $dateReservation);
        $statement->bindParam(4, $heure);
        $result = $statement->execute();
        $statement->closeCursor();

        return $result;
    }

    // Méthode pour vérifier la disponibilité d'une réservation
    public function checkAvailability($dateReservation, $heure , $terrain) {
        $sql = "SELECT COUNT(*) as count FROM reservation WHERE date_reservation = :dateReservation AND heure = :heure AND id_terrain = :terrain";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':dateReservation', $dateReservation);
        $statement->bindParam(':heure', $heure);
        $statement->bindParam(':terrain', $terrain);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['count'];
    }

    // Méthode pour obtenir les réservations par date
    public function getReservationsByDate($dateReservation,$terrain) {
        $sql = "SELECT heure FROM reservation WHERE date_reservation = :dateReservation AND id_terrain =:terrain";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':dateReservation', $dateReservation);
        $statement->bindParam(':terrain', $terrain);
        $statement->execute();
        $reservations = $statement->fetchAll(PDO::FETCH_COLUMN);

        return $reservations;
    }

    // Méthode pour obtenir les réservations par utilisateur
    public function getReservationsById($userId) {
        $sql = "SELECT * FROM reservation WHERE id_client = :userId";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':userId', $userId);
        $statement->execute();
        $reservations = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $reservations;
    }
}

?>
