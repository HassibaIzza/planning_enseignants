<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Réservation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
              <li class="breadcrumb-item active">Réservation</li>
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
                <h3 class="card-title">Réservation</h3>

                <div class="card-tools">
					<form method="GET" class="form-inline">
						<input type="hidden" name="réservation" value="0" />
						
						<select class="form-control" name="semestre" id="semestre" onchange="submit();">
							<option value='0'>Tout semestre</option>
							<option value="1" <?= selected($_GET["semestre"], "1"); ?>>1</option>
							<option value="2" <?= selected($_GET["semestre"], "2"); ?>>2</option>
						</select>
						<select class="form-control" name="annee_nom" id="annee_nom" onchange="submit();">
							<option value='0'>Tout anneé</option>
							<?php
								$query=mysqli_query($con, "SELECT * FROM ge_annees");
								
								if( $query->num_rows > 0 )
								{
									while($annee_array = mysqli_fetch_array($query))
									{
										?>
											<option value="<?= $annee_array["annee_nom"]; ?>" <?= selected($_GET["annee_nom"], $annee_array["annee_nom"]); ?>><?= $annee_array["annee_nom"]; ?></option>
										<?php
									}
								}
							?>
						</select>
					</form>
				</div>
				
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-striped ">
                  <thead>
                    <tr>
                      
                      
                     
                      <th>Salles</th>
                      <th>date</th>
                      <th>heurs</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php
						
						
						
						$emploi_semestre_condition = "1";
						
						if( isset($_GET["semestre"]) )
						{
							if( !empty($_GET["semestre"]) )
							{
								$emploi_semestre_condition = "semestre = '".$_GET["semestre"]."'";
							}
						}
						
						$annee_nom_condition = "1";
						
						if( isset($_GET["annee_nom"]) )
						{
							if( !empty($_GET["annee_nom"]) )
							{
								$annee_nom_condition = "années = '".$_GET["annee_nom"]."'";
							}
						}
						
						
						
						$query=mysqli_query($con, "SELECT * FROM réservation where ".$emploi_semestre_condition." and ".$annee_nom_condition);
						
						if( $query->num_rows > 0 )
						{
							while($client_array=mysqli_fetch_array($query))
							{
                                $query1=mysqli_query($con, "SELECT * FROM ge_salles where salle_id = '".$client_array['id']."' ");
                                $array=mysqli_fetch_array($query1)

								
								
								?>
									<tr>
										<td><?= $array["salle_nom"]; ?></td>
										<td><?= $client_array["date"]; ?></td>
                                        <td><?= $client_array["heurs"]; ?></td>
										
										
										<td>
											<?php
												if( true )
												{
													?>
														<a href="<?php print $index_page;?>?emplois_add=<?php print  $client_array['emploi_id']; ?>" class=""><i class="fa fa-edit"></i></a>
														
														<a onclick="if(!confirm('Confirmer cette etape')) return false;" href="ajax.php?function=delete_emploi&emploi_id=<?= $client_array["emploi_id"]; ?>"><i  style='' class="fa fa-trash"></i></a>
													<?php
												}
											?>
										</td>
									</tr>
								<?php
							}
						}
						else
						{
							?>
								<tr>
									<td colspan="14" style="text-align: center;">Pas de resultat</td>
								</tr>
							<?php
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