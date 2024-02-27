<?php
require_once("conbase.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification si toutes les variables POST sont définies
    if (isset($_POST["emploi_jour"], $_POST["emploi_temp"], $_POST["enseignant_nom"], $_POST["salle"] , $_POST["emploi_semestre"], $_POST["année"] ,  $_POST["module"]) ) {
        // Récupération des données du formulaire
        $enseignant =  $_POST["enseignant_nom"];
        $jour = $_POST["emploi_jour"];
        $temp= $_POST["emploi_temp"];
        $salle = $_POST["salle"];
        $semestre = $_POST["emploi_semestre"];
        $annee= $_POST["année"];
        $module= $_POST["module"];
        // Connexion à la base de données
        

        // Procéder à l'insertion des données dans la base de données
        $sql = "INSERT INTO surveillance_examen (enseignant_id, jour, temp, salle_id , semestre , années , module_id) 
                VALUES ('$enseignant', '$jour', '$temp','$salle' , '$semestre' , '$annee' , '$module')";

        if (mysqli_query($con, $sql)) {
            echo "<div class='alert alert-danger' role='alert'>
        données enregistré avec succssé !
        </div>";

        } else {
            echo "Erreur lors de l'enregistrement des données : " . mysqli_error($con);
        }

        // Fermeture de la connexion à la base de données
        mysqli_close($con);
    } else {
        // Afficher un message si certaines variables POST ne sont pas définies
        echo "<div class='alert alert-danger' role='alert'>
        Invalid Username/Password!
        </div>";

    }
}
?>
