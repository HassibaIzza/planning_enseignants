<?php
	
?>

<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="accueil.html">Accueil</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<?php
				if( true )
				{
					?>
					<div class="row">
						<div class="col-lg-3 col-6">
							<div class="small-box bg-info">
								<div class="inner">
									<h3><?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM ge_emplois")); ?></h3>
									<p>Emploi_du_temps</p>
								</div>
								<div class="icon">
									<i class="ion ion-bag"></i>
								</div>
								<a href="index_user.php?emplois=0" class="small-box-footer">Voir tout <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<div class="small-box bg-info">
								<div class="inner">
									<h3><?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM ge_enseignants")); ?></h3>
									<p>Plan d'occupation</p>
								</div>
								<div class="icon">
									<i class="ion ion-bag"></i>
								</div>
								<a href="index_user.php?salles=0" class="small-box-footer">Voir tout <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<div class="small-box bg-info">
								<div class="inner">
									<h3><?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM ge_modules")); ?></h3>
									<p>Réservation</p>
								</div>
								<div class="icon">
									<i class="ion ion-bag"></i>
								</div>
								<a href="index_user.php?modules=0" class="small-box-footer">Voir tout <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<div class="small-box bg-info">
								<div class="inner">
									<h3><?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM ge_cycles")); ?></h3>
									<p>Charge horaire</p>
								</div>
								<div class="icon">
									<i class="ion ion-bag"></i>
								</div>
								<a href="index_user.php?chargeH=0" class="small-box-footer">Voir tout <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<?php
				}
			?>
			<div class="row">
				<div class="col-12">
					<div style="text-align:center;"><img src="uploads/logo.jpg" /></div>
				</div>
			</div>
		</div>
	</section>
</div>