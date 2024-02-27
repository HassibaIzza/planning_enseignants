<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>planning surveillance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="accueil.html">Accueil</a></li>
              <li class="breadcrumb-item active">palnning surveillance</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo isset($_GET['enseignant_nom']) ? '  ' . $_GET['enseignant_nom'] : ''; ?></h3>

                <div class="card-tools">
					<form method="GET"  action="index_user.php"  class="form-inline">
					<a href="print.php?id=<?= $_GET["enseignant_nom"]; ?>&semstre=1" class="btn btn-default"><i class="fa fa-print"></i> </a>
						<input type="hidden" name="surv" value="0" />
						<select class="form-control" name="enseignant_nom" id="enseignants_id" onchange="submit();">
							<option value='0'>Enseignants</option>
							<?php
								$query = mysqli_query($con, "SELECT * FROM ge_enseignants");
								
								if( $query->num_rows > 0 )
								{
									while( $module_array_1 = mysqli_fetch_array($query) )
									{
										echo('
											<option value="'.$module_array_1["enseignant_nom"].'" '.selected($module_array_1['enseignant_nom'], $_GET["enseignant_nom"]).'>'.$module_array_1["enseignant_nom"].'</option>
										');
									}
								}
							?>
						</select>
						<select class="form-control" name="annee_nom" id="annee_id" onchange="submit();">
							<option value='0'> années </option>
							<?php
								$query_annee = mysqli_query($con, "SELECT * FROM ge_annees");
								
								if( $query_annee->num_rows > 0 )
								{
									while( $annee_array = mysqli_fetch_array($query_annee) )
									{
										echo('
											<option value="'.$annee_array["annee_nom"].'" '.selected($annee_array['annee_nom'], $_GET["annee_nom"]).'>'.$annee_array["annee_nom"].'</option>
										');
									}
								}
							?>
						</select>
						<select class="form-control" name="emploi_semestre" id="emploi_semestre" onchange="submit();">
								<label>semestre</label>
							<option value='0'>semestre</option>
							<option value="1" <?= selected($_GET["emploi_semestre"], "1"); ?>>1</option>
							<option value="2" <?= selected($_GET["emploi_semestre"], "2"); ?>>2</option>
						</select>

					</form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-striped ">
                  <thead>
                    <tr>
                      <th>heurs</th>
                      <th>jours</th>
                      <th>Salle</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php

						$emploi_semestre_condition = "1";
												
						if( isset($_GET["emploi_semestre"]) )
						{
							if( !empty($_GET["emploi_semestre"]) )
							{
								$emploi_semestre_condition = $_GET["emploi_semestre"];
							}
						}
						$annee_nom_condition = "1";
						
						if( isset($_GET["annee_nom"]) )
						{
							if( !empty($_GET["annee_nom"]) )
							{
								$annee_nom_condition = $_GET["annee_nom"];
							}
						}
						
						$enseignant_id_cond = "1";
						
						if( isset($_GET["enseignant_nom"]) )
						{
							if( !empty($_GET["enseignant_nom"]) )
							{
								$enseignant_nom = $_GET["enseignant_nom"];

								$query = mysqli_query($con, "SELECT ge_enseignants.enseignant_nom, surveillance_examen.temp as enseignant_heur, surveillance_examen.jour as enseignant_jour, ge_salles.salle_nom
								FROM ge_enseignants
								LEFT JOIN surveillance_examen ON ge_enseignants.enseignant_id = surveillance_examen.enseignant_id
								LEFT JOIN ge_salles ON surveillance_examen.salle_id = ge_salles.salle_id
								WHERE ge_enseignants.enseignant_nom = '$enseignant_nom' and surveillance_examen.années='$annee_nom_condition' and  surveillance_examen.semestre = '$emploi_semestre_condition'
								GROUP BY surveillance_examen.jour");
							

									if( $query->num_rows > 0){
										while( $client_array = mysqli_fetch_array($query) ){
											?>
										<tr>
											<td><?= $client_array["enseignant_heur"]; ?></td>
											<td><?= $client_array["enseignant_jour"]; ?></td>
											<td><?= $client_array["salle_nom"]; ?></td>
											
										</tr>
										<?php 

										}
								}else{
									echo '<tr align="center"><td colspan="3" >Aucune information disponible pour cet enseignant.</td></tr>';
								}
							}
						}
						
						
						
						
					?>
                  </tbody>
                </table>
              </div>
			  <div class="card-footer clearfix">
                <ul class="pagination float-right">
					
				</ul>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>