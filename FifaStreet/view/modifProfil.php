<?php 
session_start();
require "nav.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Profil</title>
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/mdb.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
</head>
<body>
<div class="loginform">
    <div class="row mt-5">
        <div class="col-lg-4 m-auto rounded-top">
            <h2 class="change-title" > Modification du compte </h2>
            <form action="../index.php?action=modifProfil" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input type="text" name="prenom" id="prenom" value="<?php echo $_SESSION['prenom']; ?>">
                </div>
                
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input type="text" name="nom" id="nom" value="<?php echo $_SESSION['nom']; ?>">
                </div>
                
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>">
                </div>
                
                <button type="submit" class="btn btn-success"> Modifier </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script src="../assets/js/bootstrap.bundle.js"></script>
