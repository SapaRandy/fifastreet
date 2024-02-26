<?php 
session_start();
require "nav.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes réservations</title>
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/mdb.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1 class="change-title" style="text-align:center;">Mes reservations</h1>
    <table>
        <thead>
            <tr>
                <th>Date de réservation</th>
                <th>Heure de réservation</th>
                <th>Lieu</th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($_SESSION['reservations'])) {
                // Accéder aux réservations
                $reservations = $_SESSION['reservations'];

                // Afficher les réservations
                foreach($reservations as $reservation) {
                    echo "<tr>";
                    echo "<td>" . $reservation['date_reservation'] . "</td>";
                    echo "<td>" . $reservation['heure'] . "</td>";
                    echo "<td>" . $reservation['terrain_name'] . "</td>";
                    echo "</tr>";
                }
            } else {
                // Gérer le cas où $_SESSION['reservations'] n'est pas défini
                echo "<tr><td colspan='2'>Aucune réservation trouvée.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>