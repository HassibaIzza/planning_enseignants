<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "gestion_emplois_de_temp";
    // create connection
    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
    
    if (!$con) {
        die("Echec de connexion: " . mysqli_connect_error()) ;
    }
    
   mysqli_set_charset($con, 'utf8');;
   
   mysqli_query($con, "ALTER TABLE `ge_emplois` ADD `emploi_date` VARCHAR(10) NOT NULL AFTER `salle_id`; ");
   
   return $con;
    
}
function CloseCon($con)
{
    mysqli_close($con);
   
}

if( !ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}

ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

$con=OpenCon();

function selected( $value,$status )
{
	return ($value == $status)? 'selected': '';
}

function checked( $value,$status )
{
	return ($value == $status)? 'checked': '';
}

function get_option($option_var)
{
	global $con;
	
	$element_array_rows = mysqli_query($con, "select * from ge_options where option_var = '".$option_var."'");
	$element_array_ = mysqli_fetch_array($element_array_rows);
	
	return $element_array_["option_value"];
}

?>