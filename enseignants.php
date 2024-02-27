<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Enseignants</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="accueil.html">Accueil</a></li>
              <li class="breadcrumb-item active">Enseignants</li>
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
                <h3 class="card-title">Enseignants</h3>

                <div class="card-tools">
					<form method="GET"   class="form-inline">
						<input type="hidden" name="enseignants" value="0" />
						<select class="form-control" name="departement_id" id="departement_id" onchange="submit();">
							<option value='0'>Tout departements</option>
							<?php
								$query = mysqli_query($con, "SELECT * FROM ge_departements");
								
								if( $query->num_rows > 0 )
								{
									while( $module_array_1 = mysqli_fetch_array($query) )
									{
										echo('
											<option value="'.$module_array_1["departement_id"].'" '.selected($module_array_1['departement_id'], $_GET["departement_id"]).'>'.$module_array_1["departement_nom"].'</option>
										');
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
                      <th>ID</th>
                      <th>Departement</th>
                      <th style="width: 20%;">Nom & Prenom</th>
                      <th>Date naissance</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Cour</th>
                      <th>TD</th>
                      <th>TP</th>
                      <th>Charge Horaire</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php
						$departement_id_cond = "1";
						
						if( isset($_GET["departement_id"]) )
						{
							if( !empty($_GET["departement_id"]) )
							{
								$departement_id_cond = "departement_id = '".$_GET["departement_id"]."'";
							}
						}
						
						$enseignant_cour = "(SELECT count(*) FROM ge_emplois where ge_emplois.enseignant_id = ge_enseignants.enseignant_id and emploi_type = 'cour') enseignant_cour";
						$enseignant_td = "(SELECT count(*) FROM ge_emplois where ge_emplois.enseignant_id = ge_enseignants.enseignant_id and emploi_type = 'td') enseignant_td";
						$enseignant_tp = "(SELECT count(*) FROM ge_emplois where ge_emplois.enseignant_id = ge_enseignants.enseignant_id and emploi_type = 'tp') enseignant_tp";
						
						$departement = "(select departement_nom from ge_departements where ge_departements.departement_id = ge_enseignants.departement_id) as departement";
						
						$query=mysqli_query($con, "SELECT *, ".$departement.", ".$enseignant_cour.", ".$enseignant_td.", ".$enseignant_tp." FROM ge_enseignants where ".$departement_id_cond."");
						
						if( $query->num_rows > 0 )
						{
							while($client_array=mysqli_fetch_array($query))
							{
								?>
									<tr>
										<td><?= $client_array["enseignant_id"]; ?></td>
										<td><?= $client_array["departement"]; ?></td>
										<td><?= $client_array["enseignant_nom"]." ".$client_array["enseignant_prenom"]; ?></td>
										<td><?= $client_array["enseignant_birthday"]; ?></td>
										<td><?= $client_array["enseignant_email"]; ?></td>
										<td><?= $client_array["enseignant_phone"]; ?></td>
										<td><?= $client_array["enseignant_cour"]; ?></td>
										<td><?= $client_array["enseignant_td"]; ?></td>
										<td><?= $client_array["enseignant_tp"]; ?></td>
										<td><?= ($client_array["enseignant_cour"] + $client_array["enseignant_td"] + $client_array["enseignant_tp"]) ; ?></td>
										<td>
											<a href="<?php print $index_page;?>?enseignants_add=<?php print  $client_array['enseignant_id']; ?>" class=""><i class="fa fa-edit"></i></a>
											
											<a onclick="if(!confirm('Confirmer cette etape')) return false;" href="ajax.php?function=delete_enseignant&enseignant_id=<?= $client_array["enseignant_id"]; ?>"><i  style='' class="fa fa-trash"></i></a>
											
											<a href="print_enseignant.php?id=<?php print $client_array['enseignant_id']; ?>" class=""><i class="fa fa-upload"></i></a>
										</td>
									</tr>
								<?php
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