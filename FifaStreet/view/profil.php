<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/mdb.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <title> Profil </title>
</head>
<body>
    <?php require "nav.php"; ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mt-5 pt-5">
            <h2 class="card-title text-center mb-4 mx-auto my-auto change-title" >Profil</h2>
                <div class="row z-depth-3">
                    <div class="col-sm-4 bg-dark">
                        <div class="card-block text-center text-white">
                            <i class="fas fa-user-tie fa-7x mt-5"></i>
                            <h2 class="font-weight-blod mt-4"><?php echo $_SESSION['prenom'].' '.$_SESSION['nom'] ; ?></h2>
                            <a href="modifProfil.php" style="color:white;">    
                                <i class="far fa-edit fa-2x mb-4" ></i>
                            </a>
                        </div>
                    </div>  
                <div class="col-sm-8 bg-white">
                    <h3 class="mt-3 text-center"> Info </h3>
                    <hr class="badge-dark mt-0 w-250">
                    <div class="row">
                        <div class="clo-sm-6">
                            <p class="font-weight-bold"> Email </p>
                            <p class="text-muted"> <?php echo $_SESSION['email']; ?> </p>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>
<script src="../assets/js/bootstrap.bundle.js"></script>