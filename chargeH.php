<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Charge Horaire</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
              <li class="breadcrumb-item active">Charge Horaire</li>
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
                <h3 class="card-title">Charge Horaire</h3>
                
                <div class="card-tools">
                <a href="exportChargeH.php?nom_enseignant='.$row_enseignant['nom'].'" class="btn btn-default" style="margin-right: 30px;">Exporter <i class="fas fa-upload"></i></a>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-striped ">
                  <thead>
                    <tr>
                      <th>Enseignant</th>
                      <th>Nombre de cours</th>
                      <th>Nombre de TP</th>
                      <th>Nombre de TD</th>
                      <th>Heures Totale</th>
                      <th>Charge supplimentaire</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    // Connexion à la base de données
                    require_once("conbase.php");

                    // Récupération des enseignants avec plus de 6 cours dans emploi_du_temps
                    $sql = "SELECT enseignant_id, COUNT(*) AS repetitions,
                            SUM(CASE WHEN emploi_type = 'cour' THEN 1 ELSE 0 END) AS nb_cours,
                            SUM(CASE WHEN emploi_type = 'tp' THEN 1 ELSE 0 END) AS nb_tp,
                            SUM(CASE WHEN emploi_type = 'td' THEN 1 ELSE 0 END) AS nb_td
                            FROM ge_emplois GROUP BY enseignant_id HAVING COUNT(*)  ";
                    $result = $con->query($sql);

              if ($result->num_rows > 0) {

            
                  // Afficher les enseignants qui ont plus de 6 cours
                  
                  while ($row = $result->fetch_assoc()) {
                      $heures_totale = $row["repetitions"];
                      $heures_supp = $row["repetitions"] -6 ;
                      
                      $rqt="SELECT enseignant_nom FROM ge_enseignants where ge_enseignants.enseignant_id = '".$row["enseignant_id"]."' ";
                      $rslt=$con->query($rqt);
                      $row1 = $rslt->fetch_assoc() ;
                      ?>
                      <tr>
                      <td><?= $row1["enseignant_nom"]; ?></td>
                      <td><?= $row["nb_cours"]; ?></td>
                      <td><?= $row["nb_tp"]; ?></td>
                      <td><?= $row["nb_td"]; ?></td>
                          <td><?= $heures_totale; ?></td>
                          <td><?php if ($heures_supp > 0) {
                              echo $heures_supp; 
                    
                  }else{
                        echo "0";
                    } ?></td>

                <?php
              }
           

           
           
        } else {
            echo "Aucun enseignant avec plus de 6 cours trouvés dans la table emploi_du_temps.";
        }
        echo "</div>";
        $con->close();
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