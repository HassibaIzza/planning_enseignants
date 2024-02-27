<?php
	$title_produit = "Ajouter";
	$function_to_call = "enseignant_add";
	
	if( $_GET['enseignants_add'] != 0 )
	{
		$element_array_rows = mysqli_query($con, "select * from ge_enseignants where enseignant_id = '".$_GET['enseignants_add']."'");
		$element_array = mysqli_fetch_array($element_array_rows);
		$title_produit = "Modifier";
		$function_to_call = "enseignant_edit&enseignant_id=".$_GET['enseignants_add'];
	}
	
	function is_checked($key, $value)
	{
		if($key == $value)
			return "checked";
		else
			return "";
	}
?>

<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Enseignants</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php"><?= "Accueil"; ?></a></li>
						<li class="breadcrumb-item"><a href="index.php?enseignants=0">Enseignants</a></li>
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
							<h3 class="card-title"><?= $title_produit; ?></h3>
						</div>
						<div class="card-body">
							<form action="ajax.php?function=<?= $function_to_call; ?>" method="POST" role="form" enctype="multipart/form-data">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
										<label>Nom</label>
										<input type="text" class="form-control" id="enseignant_nom" name="enseignant_nom" placeholder="Nom ..." value="<?= $element_array["enseignant_nom"]; ?>" />
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Prenom</label>
											<input type="text" class="form-control" id="enseignant_prenom" name="enseignant_prenom" placeholder="Prenom ..." value="<?= $element_array["enseignant_prenom"]; ?>" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>date de naissance</label>
											<input type="text" class="form-control" id="enseignant_birthday" name="enseignant_birthday" placeholder="date de naissance ..." value="<?= $element_array["enseignant_birthday"]; ?>" />
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Civilité</label>
											<select class="form-control" name="enseignant_civilite" id="enseignant_civilite">
												<option <?php echo selected($element_array["enseignant_civilite"], "Mr"); ?>>Mr</option>
												<option <?php echo selected($element_array["enseignant_civilite"], "Mme"); ?>>Mme</option>
												<option <?php echo selected($element_array["enseignant_civilite"], "Melle"); ?>>Melle</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
										<label>Email</label>
										<input type="text" class="form-control" id="enseignant_email" name="enseignant_email" placeholder="Email ..." value="<?= $element_array["enseignant_email"]; ?>" />
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>N° Tél</label>
											<input type="text" class="form-control" id="enseignant_phone" name="enseignant_phone" placeholder="N° Tél ..." value="<?= $element_array["enseignant_phone"]; ?>" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Grade</label>
											<input type="text" class="form-control" id="enseignant_grade" name="enseignant_grade" placeholder="Grade ..." value="<?= $element_array["enseignant_grade"]; ?>" />
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Département</label>
											<select class="form-control" name="departement_id" id="departement_id">
												<?php
													$query=mysqli_query($con, "SELECT * FROM ge_departements");
													
													if( $query->num_rows > 0 )
													{
														while( $cycle_array = mysqli_fetch_array($query) )
														{
															echo('
																<option value="'.$cycle_array["departement_id"].'" '.selected($cycle_array["departement_id"], $element_array["departement_id"]).'>'.$cycle_array["departement_nom"].'</option>
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
											<a href="index.php?enseignants=0" class="btn btn-default">Cancel</a>
											<button type="submit" class="btn btn-default"><?= $title_produit; ?></button>
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