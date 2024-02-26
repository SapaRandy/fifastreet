<?php 
session_start();
require "nav.php"; 
$date = $_GET['date'];
$terrain = $_GET['terrain'];
$heures_encoded = $_GET['heures'];
$heures = json_decode(urldecode($heures_encoded), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/mdb.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <title>Calendrier de réservation</title>
    
    <style>
    .planning-table {
    border-collapse: collapse;
    width: 100%;
    }
    
    .planning-table th, .planning-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }
    
    .planning-table th {
        background-color: #f2f2f2;
    }
    
    .planning-table td.pris {
        background-color: #ffcccc;
    }
    
    .planning-table td.disponible {
        background-color: #ccffcc;
    }
    </style>
</head>
<body>
    <h1>Planning pour le <?php echo $date; ?></h1>
    <table class="planning-table">
        <thead>
            <tr>
                <th>Heure</th>
                <th>Disponibilité</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($heures as $heure => $disponibilite) : ?>
                <tr>
                    <td><?= $heure ?></td>
                    <td class="<?= strtolower($disponibilite) ?>"><?= $disponibilite ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
