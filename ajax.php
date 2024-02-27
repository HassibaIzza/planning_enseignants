<?php
	require_once('conbase.php');
	
	$query=mysqli_query($con, "SELECT * FROM ge_users where user_id = '".$_COOKIE['abgrcs_admin_login']."' || user_id = '".$_COOKIE['abgrcs_user_login']."' ");
	
	if( $query->num_rows > 0 )
	{
		$user_array = mysqli_fetch_array($query);
	}
	
	$function = $_GET['function'];
	
	if( $function == "login" )
	{
		$pseudo = $_POST['username'];
		$password = $_POST['password'];
		$hashedPassword = md5($password);
		
		$resultat = mysqli_query($con, "select * from ge_users where user_login = '".$pseudo."' and user_pass = '".$hashedPassword."'");
		
		if( mysqli_num_rows($resultat) > 0 ){
			
			$user_array = mysqli_fetch_array($resultat);
			
			if( $user_array["Role"] == "administrator" ){
			setcookie("abgrcs_admin_login", $user_array["user_id"], time()+3600, "/");
			
			header('location: index.php');	

			}else if( $user_array['Role'] == "ChefDeparetement"){
				setcookie("abgrcs_user_login", $user_array["user_id"], time()+3600,"/");
				header('location: index_user.php');

			}else if($user_array['Role'] == "vicedoyen"){
				setcookie("abgrcs_user_login", $user_array["user_id"], time()+3600,"/");
				header('location: index_doy.php');
			}
				
		}
		else
		{
			header('location: index.php?msg=error_login');	
		}		
	}
	else if( $function == "logout" )
	{
		setcookie("abgrcs_admin_login", "", time()-3600, "/");
		
		header('location: index.php');
	}
	else if( $function == "enseignant_add" )
	{
		$query=mysqli_query($con, "
			INSERT INTO ge_enseignants
			 (departement_id, enseignant_prenom, enseignant_nom, enseignant_birthday, enseignant_email, enseignant_phone, enseignant_civilite, enseignant_grade) 
			 
			 values 
			 
			 ( '".$_POST['departement_id']."', '".$_POST['enseignant_prenom']."', '".$_POST['enseignant_nom']."', '".$_POST['enseignant_birthday']."', '".$_POST['enseignant_email']."', '".$_POST['enseignant_phone']."', '".$_POST["enseignant_civilite"]."', '".$_POST["enseignant_grade"]."');
		");
		
		header('location: index.php?enseignants=0');
	}
	else if( $function == "enseignant_edit" )
	{
		$enseignant_titulaire = ($_POST['enseignant_titulaire'] == "titulaire") ? "titulaire": "vacation";
		
		$query=mysqli_query($con, "
			UPDATE ge_enseignants SET 
				departement_id = '".$_POST['departement_id']."',
				enseignant_prenom = '".$_POST['enseignant_prenom']."',
				enseignant_nom = '".$_POST['enseignant_nom']."',
				enseignant_birthday = '".$_POST['enseignant_birthday']."',
				enseignant_email = '".$_POST['enseignant_email']."',
				enseignant_phone = '".$_POST['enseignant_phone']."',
				enseignant_civilite = '".$_POST['enseignant_civilite']."',
				enseignant_grade = '".$_POST['enseignant_grade']."'
			 	WHERE enseignant_id = '".$_GET['enseignant_id']."';
		");
		
		header('location: index.php?enseignants=0');
	}
	else if( $function == "delete_enseignant" )
	{
		$query=mysqli_query($con, "DELETE FROM ge_enseignants where enseignant_id = '".$_GET['enseignant_id']."'");
		
		header('location: index.php?enseignants=0');
	}
	
	else if( $function == "user_add" )
	{
		$password=$_POST['user_pass'];
		$hashedPassword = md5($password);
		$query=mysqli_query($con, "
			INSERT INTO ge_users
			 (user_prenom, user_nom, user_birthday, user_email, user_phone, user_login, user_pass, Role) 
			 
			 values 
			 
			 ( '".$_POST['user_prenom']."', '".$_POST['user_nom']."', '".$_POST['user_birthday']."', '".$_POST['user_email']."', '".$_POST['user_phone']."', '".$_POST['user_login']."', '".$hashedPassword."' ,'".$_POST['role']."');
		");
		
		header('location: index.php?users=0');
	}
	else if( $function == "user_edit" )
	{
		$user_titulaire = ($_POST['user_titulaire'] == "titulaire") ? "titulaire": "vacation";
		
		$query=mysqli_query($con, "
			UPDATE ge_users SET 
				user_prenom = '".$_POST['user_prenom']."',
				user_nom = '".$_POST['user_nom']."',
				user_birthday = '".$_POST['user_birthday']."',
				user_email = '".$_POST['user_email']."',
				user_phone = '".$_POST['user_phone']."',
				user_login = '".$_POST['user_login']."',
				user_pass = '".$_POST['user_pass']."'
			 WHERE user_id = '".$_GET['user_id']."';
		");
		
		header('location: index.php?users=0');
	}
	else if( $function == "delete_user" )
	{
		$query=mysqli_query($con, "DELETE FROM ge_users where user_id = '".$_GET['user_id']."'");
		
		header('location: index.php?users=0');
	}
	else if( $function == "module_add" )
	{
		$query=mysqli_query($con, "
			INSERT INTO ge_modules
			 (specialite_id, module_nom) values ( '".$_POST['specialite_id']."', '".$_POST['module_nom']."' );
		");
		
		header('location: index.php?modules=0');
	}
	else if( $function == "module_edit" )
	{
		$query=mysqli_query($con, "
			UPDATE ge_modules SET 
				specialite_id = '".$_POST['specialite_id']."',
				module_nom = '".$_POST['module_nom']."'
			 WHERE module_id = '".$_GET['module_id']."';
		");
		
		header('location: index.php?modules=0');
	}
	else if( $function == "delete_module" )
	{
		$query=mysqli_query($con, "DELETE FROM ge_modules where module_id = '".$_GET['module_id']."'");
		
		header('location: index.php?modules=0');
	}
	else if( $function == "specialite_add" )
	{
		$query=mysqli_query($con, "
			INSERT INTO ge_specialites
			 (specialite_nom, filiere_id, cycle_id) values ( '".$_POST['specialite_nom']."', '".$_POST['filiere_id']."', '".$_POST['cycle_id']."' );
		");
		
		header('location: index.php?specialites=0');
	}
	else if( $function == "specialite_edit" )
	{
		$query=mysqli_query($con, "
			UPDATE ge_specialites SET 
				specialite_nom = '".$_POST['specialite_nom']."',
				filiere_id = '".$_POST['filiere_id']."',
				cycle_id = '".$_POST['cycle_id']."'
			 WHERE specialite_id = '".$_GET['specialite_id']."';
		");
		
		header('location: index.php?specialites=0');
	}
	else if( $function == "delete_specialite" )
	{
		$query=mysqli_query($con, "DELETE FROM ge_specialites where specialite_id = '".$_GET['specialite_id']."'");
		
		header('location: index.php?specialites=0');
	}
	
	else if( $function == "filiere_add" )
	{
		$query=mysqli_query($con, "
			INSERT INTO ge_filieres
			 (filiere_nom, departement_id) values ( '".$_POST['filiere_nom']."', '".$_POST['departement_id']."' );
		");
		
		header('location: index.php?filieres=0');
	}
	else if( $function == "filiere_edit" )
	{
		$query=mysqli_query($con, "
			UPDATE ge_filieres SET 
				filiere_nom = '".$_POST['filiere_nom']."',
				departement_id = '".$_POST['departement_id']."'
			 WHERE filiere_id = '".$_GET['filiere_id']."';
		");
		
		header('location: index.php?filieres=0');
	}
	else if( $function == "delete_filiere" )
	{
		$query=mysqli_query($con, "DELETE FROM ge_filieres where filiere_id = '".$_GET['filiere_id']."'");
		
		header('location: index.php?filieres=0');
	}
	else if( $function == "departement_add" )
	{
		$query=mysqli_query($con, "
			INSERT INTO ge_departements
			 (departement_nom) values ( '".$_POST['departement_nom']."' );
		");
		
		header('location: index.php?departements=0');
	}
	else if( $function == "departement_edit" )
	{
		$query=mysqli_query($con, "
			UPDATE ge_departements SET 
				departement_nom = '".$_POST['departement_nom']."'
			 WHERE departement_id = '".$_GET['departement_id']."';
		");
		
		header('location: index.php?departements=0');
	}
	else if( $function == "delete_departement" )
	{
		$query=mysqli_query($con, "DELETE FROM ge_departements where departement_id = '".$_GET['departement_id']."'");
		
		header('location: index.php?departements=0');
	}
	else if( $function == "cycle_add" )
	{
		$query=mysqli_query($con, "
			INSERT INTO ge_cycles
			 (cycle_nom, cycle_nbr_semstre) values ( '".$_POST['cycle_nom']."', '".$_POST['cycle_nbr_semstre']."' );
		");
		
		header('location: index.php?cycles=0');
	}
	else if( $function == "cycle_edit" )
	{
		$query=mysqli_query($con, "
			UPDATE ge_cycles SET 
				cycle_nom = '".$_POST['cycle_nom']."',
				cycle_nbr_semstre = '".$_POST['cycle_nbr_semstre']."'
			 WHERE cycle_id = '".$_GET['cycle_id']."';
		");
		
		header('location: index.php?cycles=0');
	}
	else if( $function == "delete_cycle" )
	{
		$query=mysqli_query($con, "DELETE FROM ge_cycles where cycle_id = '".$_GET['cycle_id']."'");
		
		header('location: index.php?cycles=0');
	}
	else if( $function == "groupe_add" )
	{
		$query=mysqli_query($con, "
			INSERT INTO ge_groupes
			 (specialite_id, groupe_nom) values ( '".$_POST['specialite_id']."', '".$_POST['groupe_nom']."' );
		");
		
		header('location: index.php?groupes=0');
	}
	else if( $function == "groupe_edit" )
	{
		$query=mysqli_query($con, "
			UPDATE ge_groupes SET 
				specialite_id = '".$_POST['specialite_id']."',
				groupe_nom = '".$_POST['groupe_nom']."'
			 WHERE groupe_id = '".$_GET['groupe_id']."';
		");
		
		header('location: index.php?groupes=0');
	}
	else if( $function == "delete_groupe" )
	{
		$query=mysqli_query($con, "DELETE FROM ge_groupes where groupe_id = '".$_GET['groupe_id']."'");
		
		header('location: index.php?groupes=0');
	}
	else if( $function == "salle_add" )
	{
		$query=mysqli_query($con, "
			INSERT INTO ge_salles
			 (salle_nom, salle_capacite, salle_type, departement_id ) values ( '".$_POST['salle_nom']."', '".$_POST['salle_capacite']."', '".$_POST['salle_type']."' ,'1' );
		");
		
		header('location: index.php?salles=0');
	}
	else if( $function == "salle_edit" )
	{
		$query=mysqli_query($con, "
			UPDATE ge_salles SET 
				salle_nom = '".$_POST['salle_nom']."',
				salle_capacite = '".$_POST['salle_capacite']."',
				salle_type = '".$_POST['salle_type']."'
			 WHERE salle_id = '".$_GET['salle_id']."';
		");
		
		header('location: index.php?salles=0');
	}
	else if( $function == "delete_salle" )
	{
		$query=mysqli_query($con, "DELETE FROM ge_salles where salle_id = '".$_GET['salle_id']."'");
		
		header('location: index.php?salles=0');
	}
	else if( $function == "emploi_add" )
	{
		$sql_check = "SELECT * FROM ge_emplois WHERE emploi_temp = '".$_POST['emploi_temp']."' AND emploi_jour = '".$_POST['emploi_jour']."' AND (enseignant_id = '".$_POST['enseignant_id']."' OR salle_id = '".$_POST['salle_id']."') AND groupe_id = '".$_POST['groupe_id']."'";
        $result_check = mysqli_query($conn, $sql_check);

        if (mysqli_num_rows($result_check) > 0) {
            // Afficher un message d'erreur car l'enseignant ou la salle est déjà occupée à cette heure-là pour ce groupe
            echo   "Impossible d'ajouter l'emploi du temps car l'enseignant ou la salle est déjà occupée pour ce groupe à cette plage horaire.";
        }else{

			$query=mysqli_query($con, "
			INSERT INTO ge_emplois
		 (
			enseignant_id, module_id , emploi_jour, emploi_temp, groupe_id, salle_id, emploi_date_debut, emploi_date_fin, emploi_type , emploi_annee_univ , emploi_semestre
		 ) 
		 values 
		 ( '".$_POST['enseignant_id']."', '".$_POST['module_id']."', '".$_POST['emploi_jour']."', '".$_POST['emploi_temp']."', '".$_POST['groupe_id']."', '".$_POST['salle_id']."', '".$_POST['emploi_date_debut']."', '".$_POST['emploi_date_fin']."', '".$_POST['emploi_type']."', '".$_POST['emploi_annee_univ']."', '".$_POST['emploi_semestre']."' );
		");
	
		header('location: index_user.php?emplois=0');
		}
		
		
	
		
	}
	else if( $function == "emploi_edit" )
	{
		$query=mysqli_query($con, "
			UPDATE ge_emplois SET 
				emploi_jour = '".$_POST['emploi_jour']."',
				emploi_temp = '".$_POST['emploi_temp']."',
				enseignant_id = '".$_POST['enseignant_id']."',
				module_id = '".$_POST['module_id']."',
				groupe_id = '".$_POST['groupe_id']."',
				salle_id = '".$_POST['salle_id']."',
				emploi_date_debut = '".$_POST['emploi_date_debut']."',
				emploi_date_fin = '".$_POST['emploi_date_fin']."',
				emploi_type = '".$_POST['emploi_type']."',
				emploi_annee_univ = '".$_POST['emploi_annee_univ']."',
				emploi_semestre = '".$_POST['emploi_semestre']."'
			 WHERE emploi_id = '".$_GET['emploi_id']."';
		");
		
		header('location: index_user.php?emplois=0');
	}
	else if( $function == "delete_emploi" )
	{
		$query=mysqli_query($con, "DELETE FROM ge_emplois where emploi_id = '".$_GET['emploi_id']."'");
		
		header('location: index_user.php?emplois=0');
	}
	else if( $function == "examen_add" )
	{
		$query=mysqli_query($con, "
			INSERT INTO surveillance_examen
			 (
				jour, temp, enseignant_id, semestre , salle_id , années , module_id
			 ) 
			 values 
			 ( '".$_POST["emploi_jour"]."', '".$_POST["emploi_temp"]."', '". $_POST["enseignant_nom"]."', '".$_POST['emploi_semestre']."', '".$_POST["salle"]."', '".$_POST["année"]."',  '".$_POST["module"]."' );
		");
		
		header('location: index_user.php?examen=0');
	}
	else if( $function == "examen_edit" )
	{
		
		$query=mysqli_query($con, "
			UPDATE surveillance_examen SET 
				jour = '".$_POST["emploi_jour"]."',
				temp = '".$_POST["emploi_temp"]."',
				enseignant_id= '".$_POST["enseignant_nom"]."',
				semestre = '".$_POST["emploi_semestre"]."',
				salle_id = '".$_POST["salle"]."',
				années = '".$_POST["année"]."',
				module_id = '".$_POST["module"]."'
				
			 WHERE id = '".$_GET['id']."';
		");
		if (!$query) {
			die('Error: ' . mysqli_error($con));
		}else{		header('location: index_user.php?examen=0');
}
	}
	else if( $function == "delete_examen" )
	{
		$query=mysqli_query($con, "DELETE FROM surveillance_examen where id = '".$_GET['id']."'");
		
		header('location: index_user.php?examen=0');
	}
	else if( $function == "annees_add" )
	{
		$query=mysqli_query($con, "
			INSERT INTO ge_annees
			 (
				annee_nom
			 ) 
			 values 
			 ( '".$_POST['annee_nom']."' );
		");
		
		header('location: index.php?options=0');
	}
	else if( $function == "annees_delete" )
	{
		$query=mysqli_query($con, "DELETE FROM ge_annees where annee_id = '".$_GET['annee_id']."'");
		
		header('location: index.php?options=0');
	}
	else if( $function == "réservéSalle" )
	{
	
// Assuming your database connection is established and stored in $con

// Variables for the salle, date, and time you want to check
$salle_id_to_check = $_POST['salle'];
$check_date = $_POST['date'];
/*$check_time_start = $_POST['emploi_date_debut'];
$check_time_end = $_POST['emploi_date_fin'];*/

// Check if the salle is reserved in ge_emplois
$query_ge_emplois = "SELECT emploi_id FROM ge_emplois
                    WHERE salle_id = '$salle_id_to_check'
                    AND emploi_date_debut = '$check_date'";

$result_ge_emplois = mysqli_query($con, $query_ge_emplois);

// Check if the salle is reserved in reservation
$query_reservation = "SELECT id FROM reservation
                    WHERE salles = '$salle_id_to_check'
                    AND date = '$check_date'";

$result_reservation = mysqli_query($con, $query_reservation);

// Check if there are any conflicts
if (mysqli_num_rows($result_ge_emplois) > 0 || mysqli_num_rows($result_reservation) > 0) {
    echo '<p style="color: #ff0000; font-weight: bold;">La salle est déjà réservée à la date et l\'heure spécifiées.</p>';} else {
	$query=mysqli_query($con, "
			INSERT INTO réservation
			 ( salles,date ,semestre ,années ,heurs) 
			 
			 values 
			 
			 ( '".$_POST['salle']."', '".$_POST['date']."', '".$_POST['semestre']."', '".$_POST['année']."','".$_POST['temp']."');
		");
		
		header('location: index_user.php?réservation=0');
}


		
	}
	else
	{
		header("location: index.php");
	}
	
 ?>
