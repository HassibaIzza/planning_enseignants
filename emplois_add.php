<?php
  $title_produit = "Ajouter";
  $function_to_call = "emploi_add";
  
  if( $_GET['emplois_add'] != 0 )
  {
    $element_array_rows = mysqli_query($con, "select * from ge_emplois where emploi_id = '".$_GET['emplois_add']."'");
    $element_array = mysqli_fetch_array($element_array_rows);
    $title_produit = "Modifier";
    $function_to_call = "emploi_edit&emploi_id=".$_GET['emplois_add'];
  }
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Emplois</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php"><?= "Accueil"; ?></a></li>
            <li class="breadcrumb-item"><a href="index.php?emplois=0">Emplois</a></li>
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
                      <label>Jour</label>
                      <select class="form-control" name="emploi_jour" id="emploi_jour">
                        <option value="Samdi" <?= selected("Samdi", $element_array["emploi_jour"]); ?>>Samdi</option>
                        <option value="Dimanch" <?= selected("Dimanch", $element_array["emploi_jour"]); ?>>Dimanch</option>
                        <option value="Lundi" <?= selected("Lundi", $element_array["emploi_jour"]); ?>>Lundi</option>
                        <option value="Mardi" <?= selected("Mardi", $element_array["emploi_jour"]); ?>>Mardi</option>
                        <option value="Mercredi" <?= selected("Mercredi", $element_array["emploi_jour"]); ?>>Mercredi</option>
                        <option value="Jeudi" <?= selected("Jeudi", $element_array["emploi_jour"]); ?>>Jeudi</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Temp</label>
                      <select class="form-control" name="emploi_temp" id="emploi_temp">
                        <option value="08:30-09:30" <?= selected("08:30-09:30", $element_array["emploi_temp"]); ?>>08:30-09:30</option>
                        <option value="09:30-10:30" <?= selected("09:30-10:30", $element_array["emploi_temp"]); ?>>09:30-10:30</option>
                        <option value="10:30-11:30" <?= selected("10:30-11:30", $element_array["emploi_temp"]); ?>>10:30-11:30</option>
                        <option value="11:30-12:30" <?= selected("11:30-12:30", $element_array["emploi_temp"]); ?>>11:30-12:30</option>
                        <option value="12:30-13:30" <?= selected("12:30-13:30", $element_array["emploi_temp"]); ?>>12:30-13:30</option>
                        <option value="13:30-14:30" <?= selected("13:30-14:30", $element_array["emploi_temp"]); ?>>13:30-14:30</option>
                        <option value="14:30-15:30" <?= selected("14:30-15:30", $element_array["emploi_temp"]); ?>>14:30-15:30</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Enseignant</label>
                      <select class="form-control" name="enseignant_id" id="enseignant_id" required>
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
				</div>
				<div class="col-sm-6">
				  <div class="form-group">
					<label>Modules</label>
					<select class="form-control" name="module_id" id="module_id" required>
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
				<div class="col-sm-6">
				  <div class="form-group">
					<label>Groupe</label>
					<select class="form-control" name="groupe_id" id="groupe_id" required>
					  <?php
						$select_spe = "(SELECT specialite_nom from ge_specialites where ge_specialites.specialite_id = ge_groupes.specialite_id) as specialite_nom";
						
						$query=mysqli_query($con, "SELECT *, ".$select_spe." FROM ge_groupes");
						
						if( $query->num_rows > 0 )
						{
						  while( $emploi_array = mysqli_fetch_array($query) )
						  {
							echo('
							  <option value="'.$emploi_array["groupe_id"].'" '.selected($emploi_array["groupe_id"], $element_array["groupe_id"]).'>'.$emploi_array["specialite_nom"].' - '.$emploi_array["groupe_nom"].'</option>
							');
						  }
						}
					  ?>
					</select>
				  </div>
				</div>
				<div class="col-sm-6">
				  <div class="form-group">
					<label>Salle</label>
					<select class="form-control" name="salle_id" id="salle_id" required>
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
                      <input type="date" class="form-control" id="emploi_date_debut" name="emploi_date_debut"  required placeholder="Date ..." value="<?= $element_array["emploi_date_debut"]; ?>" />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Date Fin</label>
                      <input type="date" class="form-control" id="emploi_date_fin" name="emploi_date_fin" required  placeholder="Date Fin ..." value="<?= $element_array["emploi_date_fin"]; ?>" />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Type</label>
                      <select type="date" class="form-control" id="emploi_type" name="emploi_type" required>
                        <option value="cour" <?= selected($element_array["emploi_type"], "cour"); ?>>cour</option>
                        <option value="td" <?= selected($element_array["emploi_type"], "td"); ?>>td</option>
                        <option value="tp" <?= selected($element_array["emploi_type"], "tp"); ?>>tp</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Anneé universitaire</label>
                      <select class="form-control" name="emploi_annee_univ" id="salle_id">
					  <?php
						$query=mysqli_query($con, "SELECT * FROM ge_annees");
						
						if( $query->num_rows > 0 )
						{
						  while( $emploi_array = mysqli_fetch_array($query) )
						  {
							echo('
                                <option value="'.$emploi_array["annee_nom"].'" '.selected($emploi_array["annee_nom"], $element_array["annee_nom"]).'>'.$emploi_array["annee_nom"].'</option>
                              ');
                            }
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Semstre</label>
                      <select type="date" class="form-control" id="emploi_semestre" name="emploi_semestre">
                        <option value="1" <?= selected($element_array["emploi_semestre"], "1"); ?>>S1</option>
                        <option value="2" <?= selected($element_array["emploi_semestre"], "2"); ?>>S2</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group" style="text-align:right;">
                      <a href="index_user.php?emplois=0" class="btn btn-default">Cancel</a>
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