<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/base.css">
    <title>Accueil</title>
</head>
<body>
    <?php require "nav.php"; ?>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../assets/img/terrain4.jpg" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="../assets/img/terrain2.jpg" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
            <img src="../assets/img/terrain3.jpg" class="d-block w-100" alt="Slide 3">
            </div>
        </div>
    </div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleSlidesOnly'), {
        interval: 3500 // Spécifiez ici l'intervalle de défilement en millisecondes (par défaut: 5000)
    });
});
</script>
</body>
</html>