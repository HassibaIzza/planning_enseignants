<?php
	$title_produit = "Ajouter";
	$function_to_call = "module_add";
	
	if( $_GET['modules_add'] != 0 )
	{
		$element_array_rows = mysqli_query($con, "select * from ge_modules where module_id = '".$_GET['modules_add']."'");
		$element_array = mysqli_fetch_array($element_array_rows);
		$title_produit = "Modifier";
		$function_to_call = "module_edit&module_id=".$_GET['modules_add'];
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
					<h1>Modules</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php"><?= "Accueil"; ?></a></li>
						<li class="breadcrumb-item"><a href="index.php?modules=0">Modules</a></li>
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
											<label>Spécialité</label>
											<select class="form-control" name="specialite_id" id="specialite_id">
												<?php
													$query=mysqli_query($con, "SELECT * FROM ge_specialites");
													
													if( $query->num_rows > 0 )
													{
														while( $specialite_array = mysqli_fetch_array($query) )
														{
															// '.abgrcs::selected($specialite_array->specialite_id, $formation_array->specialite_id).'
															echo('
																<option value="'.$specialite_array["specialite_id"].'" '.selected($element_array["specialite_id"], $specialite_array["specialite_id"]).'>'.$specialite_array["specialite_nom"].'</option>
															');
														}
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Nom</label>
											<input type="text" class="form-control" id="module_nom" name="module_nom" placeholder="Nom ..." value="<?= $element_array["module_nom"]; ?>" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group" style="text-align:right;">
											<a href="index.php?modules=0" class="btn btn-default">Cancel</a>
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