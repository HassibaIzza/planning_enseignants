<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
              <li class="breadcrumb-item active">Users</li>
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
                <h3 class="card-title">Users</h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-striped ">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th style="width: 20%;">Nom</th>
                      <th>Prenom</th>
                      <th>Birthday</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Rôle</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php
						$query=mysqli_query($con, "SELECT * FROM ge_users");
						
						if( $query->num_rows > 0 )
						{
							while($client_array=mysqli_fetch_array($query))
							{
								?>
									<tr>
										<td><?= $client_array["user_id"]; ?></td>
										<td><?= $client_array["user_nom"]; ?></td>
										<td><?= $client_array["user_prenom"]; ?></td>
										<td><?= $client_array["user_birthday"]; ?></td>
										<td><?= $client_array["user_email"]; ?></td>
										<td><?= $client_array["user_phone"]; ?></td>
                    <td><?= $client_array["Role"]; ?></td>
										<td>
											<a href="<?php print $index_page;?>?users_add=<?php print  $client_array['user_id']; ?>" class=""><i class="fa fa-edit"></i></a>
											
											<a onclick="if(!confirm('Confirmer cette etape')) return false;" href="ajax.php?function=delete_user&user_id=<?= $client_array["user_id"]; ?>"><i  style='' class="fa fa-trash"></i></a>
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