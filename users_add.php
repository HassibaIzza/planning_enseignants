<?php
	$title_produit = "Ajouter";
	$function_to_call = "user_add";
	
	if( $_GET['users_add'] != 0 )
	{
		$element_array_rows = mysqli_query($con, "select * from ge_users where user_id = '".$_GET['users_add']."'");
		$element_array = mysqli_fetch_array($element_array_rows);
		$title_produit = "Modifier";
		$function_to_call = "user_edit&user_id=".$_GET['users_add'];
	}
	
	function is_checked($key, $value)
	{
		if($key == $value)
			return "checked";
		else
			return "";
	}
?>

<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Users</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php"><?= "Accueil"; ?></a></li>
						<li class="breadcrumb-item"><a href="index.php?users=0">Users</a></li>
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
										<label>Nom</label>
										<input type="text" class="form-control" id="user_nom" name="user_nom" placeholder="Nom ..." value="<?= $element_array["user_nom"]; ?>" />
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Prenom</label>
											<input type="text" class="form-control" id="user_prenom" name="user_prenom" placeholder="Prenom ..." value="<?= $element_array["user_prenom"]; ?>" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Date de naissance</label>
											<input type="date" class="form-control" id="user_birthday" name="user_birthday" placeholder="date de naissance ..." value="<?= $element_array["user_birthday"]; ?>" />
										</div>
									</div>
									<div class="col-sm-6">
									<div class="form-group">
											<label>N° Tél</label>
											<input type="text" class="form-control" id="user_phone" name="user_phone" placeholder="N° Tél ..." value="<?= $element_array["user_phone"]; ?>" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
										<label>Email</label>
										<input type="text" class="form-control" id="user_email" name="user_email" placeholder="Email ..." value="<?= $element_array["user_email"]; ?>" />
										</div>
									</div>
									<div class="col-sm-6">
									<div class="form-group">
											<label>Mot de passe</label>
											<input type="text" class="form-control" id="user_pass" name="user_pass" placeholder="Mot de passe ..." value="<?= $element_array["user_pass"]; ?>" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Nom d'Utilisateur</label>
											<input type="text" class="form-control" id="user_login" name="user_login" placeholder="Utilisateur ..." value="<?= $element_array["user_login"]; ?>" />
										</div>
									</div>
									<div class="col-sm-6">
									<div class="form-group">
											<label>Role</label>
											<select class="form-control" name="role">
												<option value="administrator" >Administrator</option>
												<option value="ChefDeparetement" >Chef-departement</option>
												<option value="vicedoyen" >Vice-doyen</option>

											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group" style="text-align:right;">
											<a href="index.php?users=0" class="btn btn-default">Cancel</a>
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