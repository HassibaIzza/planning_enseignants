<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width" />
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- bootstrap css and js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Emploi du temps des enseignants</title>
    <link rel="stylesheet" type="text/css"  href="styles.css">
</head>
<body>
    <div class="container">
        <?php
        // Connexion à la base de données
        $conn = mysqli_connect("localhost", "root", "", "sge");
        if (!$conn) {
            die("Connexion échouée: " . mysqli_connect_error());
        }

        // Récupération des enseignants avec plus de 6 cours dans emploi_du_temps
        $sql = "SELECT enseignant, COUNT(*) AS repetitions FROM emploi_du_temps GROUP BY enseignant HAVING COUNT(*) > 6";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            echo "<div class='emploi-enseignant'>";
            echo "<h2>Charge Supplementaire   </h2>";


 
            // Afficher les enseignants qui ont plus de 6 cours
            echo "<table class='emploi-table'>";
            echo "<tr><tr><th>Enseignant</th><th>Nombre de cours</th><th>Heures supplémentaires</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $heures_supplementaires = $row["repetitions"] - 6;
                echo "<tr>";
                echo "<td>" . $row["enseignant"] . "</td>";
                echo "<td>" . $row["repetitions"] . "</td>";
                echo "<td>" . $heures_supplementaires . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            // Liens pour voir et télécharger le PDF
            echo '<td>';
 
            echo '<a href="exportsupplementaire.php?nom_enseignant='.$row_enseignant['nom'].'" class="btn btn-danger">';
            echo '<i class="fa fa-download"></i> Télécharger PDF</a>';
            echo '</td>';
        } else {
            echo "Aucun enseignant avec plus de 6 cours trouvés dans la table emploi_du_temps.";
        }
        echo "</div>";
        $conn->close();
        ?>
     </div>
    <div class="container">
    <!-- Autres éléments -->
    <div class="button-container">
        <a href="index.php" class="button">Retour à la page d'accueil</a>
    </div>
</div>

</body>
</html>
