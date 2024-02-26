<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/mdb.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <title>Connexion</title>
</head>
<body>
    <div class="loginform">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 d-flex justify-content-center flex-column align-items-center">
                <div class="card border border-secondary">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4 mx-auto my-auto change" >Connexion</h2>
                        <form action="../index.php?action=traiterConnexion" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" id="email" placeholder="Email" required>
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" name="motDePasse" id="motDePasse" placeholder="Mot de passe" required>
                        </div>
                        <div class="text-center mt-3">
                            <a class="change" href="inscription.php">Inscription</a>
                            </br>
                            <button type="submit" class="btn btn-dark"> Connexion </button>
                        </div>
                        <?php if(isset($_SESSION['erreur'])): ?>
                                    <div class="alert alert-danger"><?php echo $_SESSION['erreur']; ?></div>
                                    <?php unset($_SESSION['erreur']); ?>
                                <?php endif; ?>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="../assets/js/bootstrap.bundle.js"></script>