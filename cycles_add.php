<?php
	$header_title = "Parcours";
	
	$title_produit = "Ajouter";
	$function_to_call = "cycle_add";
	
	if( $_GET['cycles_add'] != 0 )
	{
		$element_array_rows = mysqli_query($con, "select * from ge_cycles where cycle_id = '".$_GET['cycles_add']."'");
		$element_array = mysqli_fetch_array($element_array_rows);
		$title_produit = "Modifier";
		$function_to_call = "cycle_edit&cycle_id=".$_GET['cycles_add'];
	}
?>

<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $header_title; ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php"><?= "Accueil"; ?></a></li>
						<li class="breadcrumb-item"><a href="index.php?cycles=0"><?= $header_title; ?></a></li>
						<li class="breadcrumb-item active">Nouveau</li>
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
											<input type="text" class="form-control" id="cycle_nom" name="cycle_nom" placeholder="Nom ..." value="<?= $element_array["cycle_nom"]; ?>" />
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Nombre de Semsetre</label>
											<input type="number" class="form-control" id="cycle_nbr_semstre" name="cycle_nbr_semstre" placeholder="Nombre de Semsetre ..." value="<?= $element_array["cycle_nbr_semstre"]; ?>" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group" style="text-align:right;">
											<a href="index.php?cycles=0" class="btn btn-default">Cancel</a>
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