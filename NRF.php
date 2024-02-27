<?php
	require_once("conbase.php");
	require('tcpdf/tcpdf.php');
	$pdf = null;
	
	$query=mysqli_query($con, "SELECT * FROM ge_users where user_id = '".$_COOKIE['abgrcs_admin_login']."' || user_id = '".$_COOKIE['abgrcs_user_login']."'");
	
	if( $query->num_rows > 0 )
	{
		$salle_array = mysqli_fetch_array($query);
	}
	else
	{
		include("login.php");
		exit();
	}
	
	function get_seance($salle_id, $emploi_jour, $emploi_temp)
	{
		global $con;
		
		$query = mysqli_query($con, "SELECT * FROM ge_emplois where salle_id = '".$salle_id."' and emploi_temp = '".$emploi_temp."' and emploi_jour = '".$emploi_jour."'");
	
		if( $query->num_rows > 0 )
		{
			$emplois_array = mysqli_fetch_array($query);
			
			
			$module_array = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM ge_specialites where specialite_id= '".$emplois_array['specialite_id']."'"));
			$salle_array = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM ge_salles where salle_id = '".$emplois_array['salle_id']."'"));
			
			return $module_array['specialite_nom']."<br />".$salle_array['salle_nom'];
		}
	}
	
	// create new PDF document
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('');
	$pdf->SetTitle('plan doccupation');
  	$pdf->SetSubject('');
	$pdf->SetKeywords('contrat, guide');

	// set default header data
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 018', PDF_HEADER_STRING);

	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	// $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, 5, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// set some language dependent data:
	$lg = Array();
	$lg['a_meta_charset'] = 'UTF-8';
	$lg['a_meta_dir'] = 'rtl';
	$lg['a_meta_language'] = 'fa';
	//$lg['w_page'] = 'page';

	// set some language-dependent strings (optional)
	$pdf->setLanguageArray($lg);

	// ---------------------------------------------------------
	
	// set font
	$pdf->SetFont('dejavusans', '', 12);

	// add a page
	$pdf->AddPage();

	// set LTR direction for english translation
	$pdf->setRTL(false);

	$pdf->SetFontSize(10);

	// print newline
	$pdf->Ln();

	// Restore RTL direction
	$pdf->setRTL(false);

	// set font
	$pdf->SetFont('aefurat', '', 12);

	// print newline
	$pdf->Ln();

	// Header
	// -----------------------------------------------------------------------------
	
	$query = mysqli_query($con, "SELECT * FROM ge_salles where salle_id = '".$_GET['id']."'");
	
	if( $query->num_rows > 0 )
	{
		$salle_array = mysqli_fetch_array($query);
		
		$departement_array = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM ge_departements where departement_id = '".$salle_array['departement_id']."'"));
	}
	
	$pdf->writeHTML('<table width="100%" cellpadding="0" border="0">
		<tr>
			<td style="" width="100%" align="center">
				Ministère de l\'enseignement supérieur et de la recherche scientifique
				<br />
				Universite mostaganem
			</td>
			<td style="text-align:right;">
				<img width="100px" src="uploads/image1.png" />
			</td>
		</tr>
		<tr>
			<td rowspan="2">
				Salle : '.$salle_array['salle_nom'].'<br />
				Departement: '.$departement_array['departement_nom'].'
			</td>
		</tr>
	</table><br />', true, false, false, false, '');
	
	$resultat = "";
	
	$list_days = array("Samdi", "Dimanch", "Lundi", "Mardi", "Mercredi", "Jeudi");
	
	foreach( $list_days as $single_value )
	{
		$resultat .= '
			<tr>
				<td align="center">'.$single_value.'</td>
				<td align="center">'.get_seance($salle_array['salle_id'], $single_value, "08:30-09:30").'</td>
				<td align="center">'.get_seance($salle_array['salle_id'], $single_value, "09:30-10:30").'</td>
				<td align="center">'.get_seance($salle_array['salle_id'], $single_value, "10:30-11:30").'</td>
				<td align="center">'.get_seance($salle_array['salle_id'], $single_value, "11:30-12:30").'</td>
				<td align="center">'.get_seance($salle_array['salle_id'], $single_value, "12:30-13:30").'</td>
				<td align="center">'.get_seance($salle_array['salle_id'], $single_value, "13:30-14:30").'</td>
				<td align="center">'.get_seance($salle_array['salle_id'], $single_value, "14:30-15:30").'</td>
			</tr>
		';
	}
	
	$pdf->writeHTML('
		<table width="100%" cellpadding="0" border="1">
			<tr>
				<td align="center">Jour</td>
				<td align="center">Séance I <br /> 08:30-09:30</td>
				<td align="center">Séance II <br /> 09:30-10:30</td>
				<td align="center">Séance III <br /> 10:30-11:30</td>
				<td align="center">Séance IV <br /> 11:30-12:30</td>
				<td align="center">Séance V <br /> 12:30-13:30</td>
				<td align="center">Séance VI <br /> 13:30-14:30</td>
				<td align="center">Séance VII <br /> 14:30-15:30</td>
			</tr>
			'.$resultat.'
		</table>
	');
	
	// set LTR direction for english translation
	$pdf->setRTL(false);

	//Close and output PDF document
	$pdf->Output('example_018.pdf', 'I');
?>