<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fifa Street</title>
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/mdb.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="home.php">
            <img src="../assets/img/logo.svg" height="100px" class="d-inline-block align-top" alt="Logo">
        </a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link change" href="../view/reservation.php" >JE RESERVE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link change" href="formPlanning.php">Planning</a>
            </li>
            <?php if (isset($_SESSION['email'])){
                ?><li class="nav-item">
                    <a class="nav-link change" href="../index.php?action=myReservations">Mes reservations</a>
                </li><?php
                ?><li class="nav-item">
                    <a class="nav-link change" href="../index.php?action=profil">Profil</a>
                </li><?php
                ?><li class="nav-item">
                    <a class="nav-link change" href="../index.php?action=deconnexion">Deconnexion</a>
                </li><?php
            }else {
                ?><li class="nav-item">
                    <a class="nav-link change" href="login.php">Connexion</a>
                </li><?php
            }?>
        </ul>
        
    </nav>
</body>
</html>
<script src="../assets/js/bootstrap.bundle.js"></script>