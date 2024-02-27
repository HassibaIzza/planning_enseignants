
<?php
   

		
?>
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Réservation</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php"><?= "Accueil"; ?></a></li>
						<li class="breadcrumb-item"><a href="index.php?examen=0">Réservation</a></li>
						<li class="breadcrumb-item active">Réserver</li>
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
							<h3 class="card-title">Réserver une salle</h3>
						</div>
						<div class="card-body">
							<form action="ajax.php?function=réservéSalle" method="POST" role="form" enctype="multipart/form-data">
								<div class="row">
                                    
                                <div class="col-sm-6">
										<div class="form-group">
											<label>Salle</label>
											<select class="form-control" name="salle" id="salle_id" required>
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
											<label>Date</label>
											<input type="date" class="form-control" id="emploi_date_debut" required name="date" placeholder="Date ..." value="<?= $element_array["emploi_date_debut"]; ?>" />
										</div>
									</div>
									
									
								</div>
								<div class="row">
                                <div class="col-sm-6">
									<div class="form-group">
											<label>Semestre</label>
											<select type="date" class="form-control" id="emploi_semestre" name="semestre" required>
												<option value="1" <?= selected($element_array["semestre"], "1"); ?>>S1</option>
												<option value="2" <?= selected($element_array["semestre"], "2"); ?>>S2</option>
											</select>
									</div>
                                </div>
                                <div class="col-sm-6">
										<div class="form-group">
											<label>heure</label>
											<select class="form-control" name="temp" id="emploi_temp" required>
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
											<label>Années universitaire</label>
											<select class="form-control" name="année" id="année_id" required>
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
									
									
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group" style="text-align:right;">
											<a href="index_user.php?examen=0" class="btn btn-default">Cancel</a>
											<button type="submit" class="btn btn-default" >Réserver</button>
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