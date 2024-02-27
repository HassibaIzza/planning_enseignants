<?php
// Connexion à la base de données
$conn = mysqli_connect("localhost", "root", "", "sge");
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// Récupération des enseignants avec plus de 6 cours dans emploi_du_temps
$sql = "SELECT enseignant, COUNT(*) AS repetitions,
        SUM(CASE WHEN Type_en = 'Cours' THEN 1 ELSE 0 END) AS nb_cours,
        SUM(CASE WHEN Type_en = 'TP' THEN 1 ELSE 0 END) AS nb_tp,
        SUM(CASE WHEN Type_en = 'TD' THEN 1 ELSE 0 END) AS nb_td
        FROM emploi_du_temps GROUP BY enseignant HAVING COUNT(*)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Génération du contenu du PDF
    $pdf_content = "<h1>Charge horaire </h1>";
    $pdf_content .= "<table border='1'><tr><th>Enseignant</th><th>Nombre de cours</th><th>Nombre de TP</th><th>Nombre de TD</th><th>Heures Totale</th></tr>";

    while ($row = $result->fetch_assoc()) {
        $heures_totale = $row["repetitions"] ;
        $pdf_content .= "<tr>";
        $pdf_content .= "<td>" . $row["enseignant"] . "</td>";
        $pdf_content .= "<td>" . $row["nb_cours"] . "</td>";
        $pdf_content .= "<td>" . $row["nb_tp"] . "</td>";
        $pdf_content .= "<td>" . $row["nb_td"] . "</td>";
        $pdf_content .= "<td>" . $heures_totale . "</td>";
        $pdf_content .= "</tr>";
    }

    $pdf_content .= "</table>";

    // Génération du PDF
    $filename = "charge_horaire_enseignants.pdf";
    header("Content-type: application/pdf");
    header("Content-Disposition: attachment; filename=$filename");
    echo $pdf_content;
} else {
    echo "Aucun enseignant avec plus de 6 cours trouvés dans la table emploi_du_temps.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
