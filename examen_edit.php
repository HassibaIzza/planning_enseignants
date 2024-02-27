
<?php
	require_once("conbase.php");
	
	$query=mysqli_query($con, "SELECT * FROM surveillance_examen where id = '".$_GET['examen_edit']."'");
	
	if( $query->num_rows > 0 )
	{
		$element_array = mysqli_fetch_array($query);
	}
	else
	{
		include("login.php");
		exit();
	}
?>
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Examen</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php"><?= "Accueil"; ?></a></li>
						<li class="breadcrumb-item"><a href="index.php?examen=0">Examen</a></li>
						<li class="breadcrumb-item active">nouveau</li>
					</ol>
				</div>
			</div>
		</div>
	</section>
	
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Modifier</h3>
						</div>
						<div class="card-body">
							<form action="ajax.php?function=examen_edit" method="POST" role="form" enctype="multipart/form-data">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Jour</label>
											<select class="form-control" name="emploi_jour" id="emploi_jour">
												<option value="Samdi" <?= selected("Samdi", $element_array["jour"]); ?>>Samdi</option>
												<option value="Dimanch" <?= selected("Dimanch", $element_array["jour"]); ?>>Dimanch</option>
												<option value="Lundi" <?= selected("Lundi", $element_array["jour"]); ?>>Lundi</option>
												<option value="Mardi" <?= selected("Mardi", $element_array["our"]); ?>>Mardi</option>
												<option value="Mercredi" <?= selected("Mercredi", $element_array["jour"]); ?>>Mercredi</option>
												<option value="Jeudi" <?= selected("Jeudi", $element_array["jour"]); ?>>Jeudi</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Temp</label>
											<select class="form-control" name="emploi_temp" id="emploi_temp">
												<option value="08:30-09:30" <?= selected("08:30-09:30", $element_array["temp"]); ?>>08:30-09:30</option>
												<option value="09:30-10:30" <?= selected("09:30-10:30", $element_array["temp"]); ?>>09:30-10:30</option>
												<option value="10:30-11:30" <?= selected("10:30-11:30", $element_array["temp"]); ?>>10:30-11:30</option>
												<option value="11:30-12:30" <?= selected("11:30-12:30", $element_array["temp"]); ?>>11:30-12:30</option>
												<option value="12:30-13:30" <?= selected("12:30-13:30", $element_array["temp"]); ?>>12:30-13:30</option>
												<option value="13:30-14:30" <?= selected("13:30-14:30", $element_array["temp"]); ?>>13:30-14:30</option>
												<option value="14:30-15:30" <?= selected("14:30-15:30", $element_array["temp"]); ?>>14:30-15:30</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Enseignant</label>
											<select class="form-control" name="enseignant_nom" id="enseignant_id">
												<?php
													$select_dep = "(SELECT departement_nom from ge_departements where ge_departements.departement_id = ge_enseignants.departement_id) as deparetement_nom";
													
													$query=mysqli_query($con, "SELECT *, ".$select_dep." FROM ge_enseignants");
													
													if( $query->num_rows > 0 )
													{
														while( $emploi_array = mysqli_fetch_array($query) )
														{
															echo('
																<option value="'.$emploi_array["enseignant_id"].'" '.selected($emploi_array["enseignant_id"], $element_array["enseignant_id"]).'>'.$emploi_array["deparetement_nom"]." - ".$emploi_array["enseignant_nom"]." ".$emploi_array["enseignant_prenom"].'</option>
															');
														}
													}
												?>
											</select>
										</div>
										<div class="col-sm-6">
										
									</div>
									</div>
									<div class="form-group">
											<label>Semestre</label>
											<select type="date" class="form-control" id="emploi_semestre" name="emploi_semestre">
												<option value="1" <?= selected($element_array["semestre"], "1"); ?>>S1</option>
												<option value="2" <?= selected($element_array["semestre"], "2"); ?>>S2</option>
											</select>
										</div>

									
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Salle</label>
											<select class="form-control" name="salle" id="salle_id">
												<?php
													$query=mysqli_query($con, "SELECT * FROM ge_salles");
													
													if( $query->num_rows > 0 )
													{
														while( $emploi_array = mysqli_fetch_array($query) )
														{
															echo('
																<option value="'.$emploi_array["salle_id"].'" '.selected($emploi_array["salle_id"], $element_array["salle_id"]).'>'.$emploi_array["salle_nom"].'</option>
															');
														}
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Années universitaire</label>
											<select class="form-control" name="année" id="année_id">
												<?php
													$query=mysqli_query($con, "SELECT * FROM ge_annees");
													
													if( $query->num_rows > 0 )
													{
														while( $anne_array = mysqli_fetch_array($query) )
														{
															echo('
																<option value="'.$anne_array["annee_nom"].'" '.selected($anne_array["annee_nom"], $element_array["années"]).'>'.$anne_array["annee_nom"].'</option>
															');
														}
													}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									
									<div class="col-sm-6">
										<div class="form-group">
										<label>Modules</label>
										<select class="form-control" name="module" id="module_id">
												<?php
													$select_spe = "(SELECT specialite_nom from ge_specialites where ge_specialites.specialite_id = ge_modules.specialite_id) as specialite_nom";
													
													$query=mysqli_query($con, "SELECT *, ".$select_spe." FROM ge_modules");
													
													if( $query->num_rows > 0 )
													{
														while( $emploi_array = mysqli_fetch_array($query) )
														{
															echo('
																<option value="'.$emploi_array["module_id"].'" '.selected($emploi_array["module_id"], $element_array["module_id"]).'>'.$emploi_array["specialite_nom"].' - '.$emploi_array["module_nom"].'</option>
															');
														}
													}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group" style="text-align:right;">
											<a href="index_user.php?examen=0" class="btn btn-default">Cancel</a>
											<button type="submit" class="btn btn-default" >Modifier</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="card-footer">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>