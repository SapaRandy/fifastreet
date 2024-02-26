<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/mdb.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <title>création d'un compte</title>
</head>
<body>
<div class="loginform">
    <div class="row mt-5">
        <div class="col-lg-4 m-auto rounded-top">
            <h2 class="change" style="margin-bottom: 10%;">Creation d'un compte</h2>
            <form action="../index.php?action=traiterCreation" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input type="text" name="prenom" id="prenom" placeholder="Prenom"required>
                </div>
                
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input type="text" name="nom" id="nom" placeholder="Nom "required>
                </div>
                
                <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                
                <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" name="motDePasse" id="motDePasse" placeholder="Mot de passe" required>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-success"> S'inscrire </button>
                    <p class="text-center text muted">
                        En cliquant sur s'inscrire, vous acceptez nos <a href=""> Conditions générales </a>, notre <a href=""> Politique de confidentialité </a> et notre <a href=""> Politiques d'utilisations </a> des cookies.
                    </p>
                    <p class="text-center">
                        Avez vous déjà un compte? <a href="login.php"> Connexion </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script src="../assets/js/bootstrap.bundle.js"></script>