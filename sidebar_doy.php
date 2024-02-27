
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
                <a href="accueil.html" class="brand-link" style="text-align: center;">
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
                    <a href="index_user.php" class="d-block"><?= $enseignant_array["user_prenom"]." ".$enseignant_array["user_nom"]; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="index_user.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Emplois du temps
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index_user.php?emplois=0" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Emplois du temps</p>
                                </a>
                            </li>
                            
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Emplois Examen
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index_user.php?examen=0" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Emplois Examen</p>
                                </a>
                            </li>
                           
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Réservations
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index_user.php?emplois=0" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Réservation</p>
                                </a>
                            </li>
                            
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Plan d'occupation
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index_user.php?salles=0" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Consulter</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Extraction
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav-item nav-treeview has-treeview">
                            
                            <li class="nav-item">
                                <a href="index_user.php?emplois=0" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Extraire Emplois du temps </p>
                                </a>
                            <ul class="nav nav-treeview">
                           
                            </ul>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index_user.php?enseignants=0" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Enseignants</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index_user.php?emplois=0" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Créneaux</p>
                                </a>
                            </li>
                            </ul>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index_user.php?salles=0" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Salles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index_user.php?surv=0" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>planning du survéillance</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index_user.php?chargeH=0" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Charge Horaire</p>
                                </a>
                            </li>
                            </ul>
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
