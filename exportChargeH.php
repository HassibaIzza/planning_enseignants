<?php
require_once('tcpdf/tcpdf.php'); // Adjust the path according to your project structure
require_once("conbase.php");





// Your HTML table content




class PDF extends TCPDF
{
    public function Header()
    {
        // Add your header content here (if needed)
    }

    public function Footer()
    {
        // Add your footer content here (if needed)
    }
}

$pdf = new PDF();
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->AddPage();

$pdf->SetFont('times', '', 12);

// Connect to the database
require_once("conbase.php");

$pdf->writeHTML('<table width="100%" cellpadding="0" border="0">
				<tr>
					<td style="" width="100%" align="center">
						Ministère de l\'enseignement supérieur et de la recherche scientifique
						<br />
						Universite Abdel Hamid Ibn Badis Mostaganem <br  />
					</td>
					<td style="text-align:right;">
						<img width="100px" src="uploads/image1.png" />
					</td>
				</tr>
				<tr>
					<td rowspan="2" align="center">
						La Charge Horaire des Enseignants 
					</td>
				</tr>
			</table><br />', true, false, false, false, '');

// Retrieve data from the database
$sql = $sql = "SELECT enseignant_id, COUNT(*) AS repetitions,
SUM(CASE WHEN emploi_type = 'cour' THEN 1 ELSE 0 END) AS nb_cours,
SUM(CASE WHEN emploi_type = 'tp' THEN 1 ELSE 0 END) AS nb_tp,
SUM(CASE WHEN emploi_type = 'td' THEN 1 ELSE 0 END) AS nb_td
FROM ge_emplois GROUP BY enseignant_id HAVING COUNT(*)  ";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    
    // Generate table headers
    $html = '<table border="1">
                <thead>
                    <tr>
                        <th>Enseignant</th>
                        <th>Nombre de cours</th>
                        <th>Nombre de TP</th>
                        <th>Nombre de TD</th>
                        <th>Heures Totale</th>
                        <th>Charge supplémentaire</th>
                    </tr>
                </thead>
                <tbody>';

    // Generate table rows from database results
    while ($row = $result->fetch_assoc()) {
        $rqt="SELECT enseignant_nom FROM ge_enseignants where ge_enseignants.enseignant_id = '".$row["enseignant_id"]."' ";
                $rslt=$con->query($rqt);
                $row1 = $rslt->fetch_assoc() ;
        $heures_totale = $row["repetitions"];
        $heures_supp = $row["repetitions"] -6 ;
        if ($heures_supp<0) {
            $heures_supp=0;
        }
        $html .= '<tr>
                    <td>' . $row1["enseignant_nom"] . '</td>
                    <td>' . $row["nb_cours"] . '</td>
                    <td>' . $row["nb_tp"] . '</td>
                    <td>' . $row["nb_td"] . '</td>
                    <td>' . $heures_totale . '</td>
                    <td>' . $heures_supp . '</td>
                    
                </tr>';
    }

    // Close the table
    $html .= '</tbody></table>';

    // Output HTML to PDF
    $pdf->writeHTML($html, true, false, true, false, '');
} else {
    // No data found message
    $pdf->writeHTML('<p>No data found.</p>', true, false, true, false, '');
}

// Output PDF to browser or save to file
$pdf->Output('charge_horaire.pdf', 'I'); // 'I' to send the file inline to the browser

// Close the database connection
$con->close();
?>


$pdf->writeHTML($html, true, false, true, false, '');

// Output PDF to browser or save to file
$pdf->Output('charge_horaire.pdf', 'I'); // 'I' to send the file inline to the browser

?>
