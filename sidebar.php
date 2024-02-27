
<script language="javascript" type="text/javascript">
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</script>

<!-- Main Sidebar Container -->
		  <aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link" style="text-align: center;">
			  <!-- Brand Logo -->
			  <span class="brand-text font-weight-light">SGE_FSEI</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
			  <!-- Sidebar user panel (optional) -->
			  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
				  <img src="dist/img/user.jpg" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
				  <a href="index.php" class="d-block"><?= $enseignant_array["user_prenom"]." ".$enseignant_array["user_nom"]; ?></a>
				</div>
			  </div>

			  <!-- Sidebar Menu -->
			  <nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
					<li class="nav-item">
						<a href="index.php" class="nav-link">
						  <i class="nav-icon fas fa-tachometer-alt"></i>
						  <p>Dashboard</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="index.php?options=0" class="nav-link">
						  <i class="nav-icon fa fa-bars"></i>
						  <p>Année universitaire</p>
						</a>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
						  <i class="nav-icon fa fa-bars"></i>
						  <p>
							Départements
							<i class="fas fa-angle-left right"></i>
						  </p>
						</a>
						<ul class="nav nav-treeview">
						  <li class="nav-item">
							<a href="index.php?departements=0" class="nav-link">
							  <i class="fa fa-bars nav-icon"></i>
							  <p>Départements</p>
							</a>
						  </li>
						  <li class="nav-item">
							<a href="index.php?departements_add=0" class="nav-link">
							  <i class="far fa-plus-square nav-icon"></i>
							  <p>Ajouter</p>
							</a>
						  </li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
						  <i class="nav-icon fa fa-bars"></i>
						  <p>
							Filière
							<i class="fas fa-angle-left right"></i>
						  </p>
						</a>
						<ul class="nav nav-treeview">
						  <li class="nav-item">
							<a href="index.php?filieres=0" class="nav-link">
							  <i class="fa fa-bars nav-icon"></i>
							  <p>Filière</p>
							</a>
						  </li>
						  <li class="nav-item">
							<a href="index.php?filieres_add=0" class="nav-link">
							  <i class="far fa-plus-square nav-icon"></i>
							  <p>Ajouter</p>
							</a>
						  </li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
						  <i class="nav-icon fa fa-bars"></i>
						  <p>
							Parcour
							<i class="fas fa-angle-left right"></i>
						  </p>
						</a>
						<ul class="nav nav-treeview">
						  <li class="nav-item">
							<a href="index.php?cycles=0" class="nav-link">
							  <i class="fa fa-circle nav-icon"></i>
							  <p>Parcour</p>
							</a>
						  </li>
						  <li class="nav-item">
							<a href="index.php?cycles_add=0" class="nav-link">
							  <i class="fa fa-plus-square nav-icon"></i>
							  <p>Ajouter</p>
							</a>
						  </li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
						  <i class="nav-icon fa fa-bars"></i>
						  <p>
							Spécialités
							<i class="fas fa-angle-left right"></i>
						  </p>
						</a>
						<ul class="nav nav-treeview">
						  <li class="nav-item">
							<a href="index.php?specialites=0" class="nav-link">
							  <i class="fa fa-bars nav-icon"></i>
							  <p>Spécialités</p>
							</a>
						  </li>
						  <li class="nav-item">
							<a href="index.php?specialites_add=0" class="nav-link">
							  <i class="far fa-plus-square nav-icon"></i>
							  <p>Ajouter</p>
							</a>
						  </li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
						  <i class="nav-icon fa fa-bars"></i>
						  <p>
							Salles
							<i class="fas fa-angle-left right"></i>
						  </p>
						</a>
						<ul class="nav nav-treeview">
						  <li class="nav-item">
							<a href="index.php?salleAdmin=0" class="nav-link">
							  <i class="fa fa-layer-group nav-icon"></i>
							  <p>Salles</p>
							</a>
						  </li>
						  <li class="nav-item">
							<a href="index.php?salles_add=0" class="nav-link">
							  <i class="fa fa-plus-square nav-icon"></i>
							  <p>Ajouter</p>
							</a>
						  </li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
						  <i class="nav-icon fa fa-bars"></i>
						  <p>
							Groupes
							<i class="fas fa-angle-left right"></i>
						  </p>
						</a>
						<ul class="nav nav-treeview">
						  <li class="nav-item">
							<a href="index.php?groupes=0" class="nav-link">
							  <i class="fa fa-layer-group nav-icon"></i>
							  <p>Groupes</p>
							</a>
						  </li>
						  <li class="nav-item">
							<a href="index.php?groupes_add=0" class="nav-link">
							  <i class="fa fa-plus-square nav-icon"></i>
							  <p>Ajouter</p>
							</a>
						  </li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
						  <i class="nav-icon fa fa-users"></i>
						  <p>
							Enseignants
							<i class="fas fa-angle-left right"></i>
						  </p>
						</a>
						<ul class="nav nav-treeview">
						  <li class="nav-item">
							<a href="index.php?enseignants=0" class="nav-link">
							  <i class="fa fa-users nav-icon"></i>
							  <p>Enseignants</p>
							</a>
						  </li>
						  <li class="nav-item">
							<a href="index.php?enseignants_add=0" class="nav-link">
							  <i class="far fa-plus-square nav-icon"></i>
							  <p>Ajouter</p>
							</a>
						  </li>
						</ul>
					</li>
				
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
						  <i class="nav-icon fa fa-book"></i>
						  <p>
							Modules
							<i class="fas fa-angle-left right"></i>
						  </p>
						</a>
						<ul class="nav nav-treeview">
						  <li class="nav-item">
							<a href="index.php?modules=0" class="nav-link">
							  <i class="fa fa-book nav-icon"></i>
							  <p>Modules</p>
							</a>
						  </li>
						  <li class="nav-item">
							<a href="index.php?modules_add=0" class="nav-link">
							  <i class="fa fa-plus-square nav-icon"></i>
							  <p>Ajouter</p>
							</a>
						  </li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
						  <i class="nav-icon fa fa-users"></i>
						  <p>
							Utilisateurs
							<i class="fas fa-angle-left right"></i>
						  </p>
						</a>
						<ul class="nav nav-treeview">
						  <li class="nav-item">
							<a href="index.php?users=0" class="nav-link">
							  <i class="fa fa-users nav-icon"></i>
							  <p>utilisateurs</p>
							</a>
						  </li>
						  <li class="nav-item">
							<a href="index.php?users_add=0" class="nav-link">
							  <i class="fa fa-plus-square nav-icon"></i>
							  <p>Ajouter</p>
							</a>
						  </li>
						</ul>
					</li>
					<li>
			           <div class="hero-unit-clock">
		
			        <form name="clock">
			        <font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			        </form>
			           </div>
			        </li>
				</ul>
			  </nav>
			  <!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		  </aside>
