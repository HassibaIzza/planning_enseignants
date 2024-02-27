<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Emplois</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
              <li class="breadcrumb-item active">Emplois</li>
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
                <h3 class="card-title">Emplois</h3>

                <div class="card-tools">
          <form method="GET" class="form-inline">
            <input type="hidden" name="emplois" value="0" />
            <select class="form-control" name="specialite_id" id="specialite_id" onchange="submit();">
              <option value='0'>Tout</option>
              <?php
                $query = mysqli_query($con, "SELECT *, (select filiere_nom from ge_filieres where ge_filieres.filiere_id = ge_specialites.filiere_id) as filiere_nom FROM ge_specialites");
                
                if( $query->num_rows > 0 )
                {
                  while( $module_array_1 = mysqli_fetch_array($query) )
                  {
                    echo('
                      <option value="'.$module_array_1["specialite_id"].'" '.selected($module_array_1['specialite_id'], $_GET["specialite_id"]).'>'.$module_array_1["filiere_nom"].' - '.$module_array_1["specialite_nom"].'</option>
                    ');
                  }
                }
              ?>
            </select>
            <select class="form-control" name="emploi_semestre" id="emploi_semestre" onchange="submit();">
              <option value='0'>Tout semestre</option>
              <option value="1" <?= selected($_GET["emploi_semestre"], "1"); ?>>1</option>
              <option value="2" <?= selected($_GET["emploi_semestre"], "2"); ?>>2</option>
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
        <div class="card-tools">
          <?php
            if( isset($_GET["specialite_id"]) )
            {
              if( !empty($_GET["specialite_id"]) )
              {
                ?>
                  <a href="print.php?id=<?= $_GET["specialite_id"]; ?>&semstre=1" class="btn btn-default"><i class="fa fa-print"></i> S1</a>
                  <a href="print.php?id=<?= $_GET["specialite_id"]; ?>&semstre=2" class="btn btn-default"><i class="fa fa-print"></i> S2</a>
                <?php
              }
            }
          ?>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-striped ">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Jour</th>
                      <th>Temp</th>
                      <th>Enseignant</th>
                      <th>Departement</th>
                      <th>Filiere</th>
<th>Specialite</th>
                      <th>Module</th>
                      <th>Groupe</th>
                      <th>Salle</th>
                      <th>type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php
            $specialite_id_cond = "1";
            
            if( isset($_GET["specialite_id"]) )
            {
              if( !empty($_GET["specialite_id"]) )
              {
                $specialite_id_cond = "module_id in (select module_id from ge_modules where ge_modules.specialite_id = '".$_GET["specialite_id"]."')";
              }
            }
            
            $emploi_semestre_condition = "1";
            
            if( isset($_GET["emploi_semestre"]) )
            {
              if( !empty($_GET["emploi_semestre"]) )
              {
                $emploi_semestre_condition = "emploi_semestre = '".$_GET["emploi_semestre"]."'";
              }
            }
            
            $annee_nom_condition = "1";
            
            if( isset($_GET["annee_nom"]) )
            {
              if( !empty($_GET["annee_nom"]) )
              {
                $annee_nom_condition = "emploi_annee_univ = '".$_GET["annee_nom"]."'";
              }
            }
            
            $enseignant_id = "(select enseignant_nom from ge_enseignants where ge_enseignants.enseignant_id = ge_emplois.enseignant_id) as enseignant_nom";
            $module_id = "(select module_nom from ge_modules where ge_modules.module_id = ge_emplois.module_id) as module_nom";
            $groupe_id = "(select groupe_nom from ge_groupes where ge_groupes.groupe_id = ge_emplois.groupe_id) as groupe_nom";
            $salle_id = "(select salle_nom from ge_salles where ge_salles.salle_id = ge_emplois.salle_id) as salle_nom";
            
            $specialite_nom = "(SELECT specialite_nom from ge_specialites where ge_specialites.specialite_id in (select ge_modules.specialite_id from ge_modules where ge_modules.module_id = ge_emplois.module_id)) as specialite_nom";
            
            $query=mysqli_query($con, "SELECT *, ".$enseignant_id.", ".$module_id.", ".$groupe_id.", ".$salle_id.", ".$specialite_nom." FROM ge_emplois where ".$specialite_id_cond." and ".$emploi_semestre_condition." and ".$annee_nom_condition);
            
            if( $query->num_rows > 0 )
            {
              while($client_array=mysqli_fetch_array($query))
              {
                $query_module=mysqli_query($con, "SELECT * FROM ge_modules where ge_modules.module_id = '".$client_array["module_id"]."'");
                $module_array = mysqli_fetch_array($query_module);
                
                $query_spe=mysqli_query($con, "SELECT * FROM ge_specialites where ge_specialites.specialite_id = '".$module_array["specialite_id"]."'");
                $spe_array = mysqli_fetch_array($query_spe);
                
                $query_filiere=mysqli_query($con, "SELECT * FROM ge_filieres where ge_filieres.filiere_id = '".$spe_array["filiere_id"]."'");
                $filiere_array = mysqli_fetch_array($query_filiere);
                
                $query_dep=mysqli_query($con, "SELECT * FROM ge_departements where ge_departements.departement_id = '".$filiere_array["departement_id"]."'");
                $dep_array = mysqli_fetch_array($query_dep);
                
                ?>
                  <tr>
                    <td><?= $client_array["emploi_id"]; ?></td>
                    <td><?= $client_array["emploi_jour"]; ?></td>
                    <td><?= $client_array["emploi_temp"]; ?></td>
                    <td><?= $client_array["enseignant_nom"]; ?></td>
                    <td><?= $dep_array["departement_nom"]; ?></td>
                    <td><?= $filiere_array["filiere_nom"]; ?></td>
                    <td><?= $client_array["specialite_nom"]; ?></td>
                    <td><?= $client_array["module_nom"]; ?></td>
                    <td><?= $client_array["groupe_nom"]; ?></td>
<td><?= $client_array["salle_nom"]; ?></td>
                    <td><?= $client_array["emploi_type"]; ?></td>
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