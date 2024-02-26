<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/mdb.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <title>Reservations</title>
</head>
<body>
    <?php require "nav.php"; ?>
    <div class="loginform">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 d-flex justify-content-center flex-column align-items-center">
                <div class="card border border-secondary">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4 mx-auto my-auto change-title" >Reservation </h2>
                        <form action="../index.php?action=createReservation" method="post">
                            <label for="date">Date :</label><br>
                            <input type="date" name="date" required><br>
                            <label for="heure">Heure début:</label><br>
                            <select name="heure" id="heure" required>
                                <?php
                                for ($i = 0; $i < 24; $i++) {
                                    $heure = str_pad($i, 2, "0", STR_PAD_LEFT) . ":00"; 
                                    echo "<option value=\"$heure\">$heure</option>";
                                }
                                ?>
                            </select><br>
                            
                            <label for="heureFin">Terrain:</label><br>
                            <select name="terrain" id="terrain" required>
                                <option value="">--Choisissez un terrain--</option>
                                <option value="1">Erimates Stadium</option>
                                <option value="2">Camp Nou</option>
                                <option value="3">San Siro</option>
                                <option value="4">Vélodrome</option>
                            </select><br>
                            <br>
                            <button type="submit">Réserver</button>
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
