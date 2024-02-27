
    
<!-- =============== Navigation ================ -->
 <div class="sidebar close">
      <!-- ========== Logo ============  -->
      <a href="#" class="logo-box">
        <i class="fas fa-university"></i>

          <div class="logo-name">SGE_FSEI</div>
      </a>

      <!-- ========== List ============  -->
      <ul class="sidebar-list">
          <!-- -------- Non Dropdown List Item ------- -->
          <li>
              <div class="title">
                  <a href="" class="link">
                    <i class="fas fa-th"></i>
                      <span class="name">Chef Departement</span>
                  </a>
                  <!-- <i class='bx bxs-chevron-down'></i> -->
              </div>
              <div class="submenu">
              <a href="index_user.php" class="d-block"><?= $enseignant_array["user_prenom"]." ".$enseignant_array["user_nom"]; ?></a>
                  <!-- submenu links here  -->
              </div>
          </li>

          <!-- -------- Dropdown List Item ------- -->
          <li class="dropdown">
              <div class="title">
                  <a href="#" class="link">
                  <i class="far fa-calendar-plus"></i>
                      <span class="name">Saisir EDT</span>
                  </a>
                  <i class='bx bxs-chevron-down'></i>
              </div>
              <div class="submenu">
                  <a href="#" class="link submenu-title">Saisir Emploi Du Temps</a>
                  <a href="index_user.php?emplois_add=0" class="link">Saisir </a>
                  <a href="index_user.php?emplois=0" class="link">Afficher</a>
                  
              </div>
          </li>

          <!-- -------- Dropdown List Item ------- -->
          <li class="dropdown">
              <div class="title">
                  <a href="#" class="link">
                  <i class="fas fa-file-export"></i>
                      <span class="name"> Extraire EDT</span>
                  </a>
                  <i class='bx bxs-chevron-down'></i>
              </div>
              <div class="submenu">
                  <a href="#" class="link submenu-title">Extraire Emploi Du Temps</a>
                  <a href="index_user.php?enseignants=0" class="link">Enseignants</a>
                  <a href="index_user.php?salles=0" class="link">Salle</a>
                  <a href="index_user.php?chargeH=0" class="link">Charge Horaire </a>
                  <a href="index_user.php?surv=0" class="link">Salle</a>

                  
              </div>
          </li>

          <!-- -------- Non Dropdown List Item ------- -->
          <li class="dropdown">
              <div class="title">
                  <a href="#" class="link">
                  <i class="far fa-calendar-check"></i>
                      <span class="name">Saisir EDT Examens</span>
                  </a>
                  <i class='bx bxs-chevron-down'></i>
              </div>
              <div class="submenu">
                  <a href="#" class="link submenu-title">Emploi Examen </a>
                  <a href="index_user.php?examen_add=0" class="link">Saisir </a>
                  <a href="index_user.php?examen=0" class="link">Afficher</a>
              </div>
          </li>

          <!-- -------- Non Dropdown List Item ------- -->
          <li class="dropdown">
              <div class="title">
                  <a href="#" class="link">
                  <i class="fas fa-file-export"></i>
                      <span class="name"> Extraire PS</span>
                  </a>
                  <i class='bx bxs-chevron-down'></i>
              </div>
              <div class="submenu">
                  <a href="#" class="link submenu-title">Extraire Planning du surveillance</a>
                  <a href="affichersrv.php" class="link">Enseignants</a>
              </div>
          </li>

          <!-- -------- Dropdown List Item ------- -->
          
          <!-- -------- Non Dropdown List Item ------- 
          <li class="dropdown">
            <div class="title">
                <a href="#" class="link">
                  <i class="fas fa-door-open"></i>
                    <span class="name">salles</span>
                </a>
                <i class='bx bxs-chevron-down'></i>
            </div>
            <div class="submenu">
                <a href="#" class="link submenu-title">Gestion des salles</a>
                <a href="#" class="link">Web Design</a>
                <a href="#" class="link">Login Form</a>
                <a href="#" class="link">Card Design</a>
            </div>
        </li>

           -------- Non Dropdown List Item -------
          <li class="dropdown">
            <div class="title">
                <a href="#" class="link">
                  <i class="fas fa-book"></i>
                    <span class="name">matières</span>
                </a>
                <i class='bx bxs-chevron-down'></i>
            </div>
            <div class="submenu">
                <a href="#" class="link submenu-title">Gestion des matières</a>
                <a href="#" class="link">Web Design</a>
                <a href="#" class="link">Login Form</a>
                <a href="#" class="link">Card Design</a>
            </div>
        </li>

           -------- Non Dropdown List Item ------- 
          <li class="dropdown">
            <div class="title">
                <a href="#" class="link">
                  <i class="fas fa-users-cog"></i>
                    <span class="name">utilisateurs</span>
                </a>
                <i class='bx bxs-chevron-down'></i>
            </div>
            <div class="submenu">
                <a href="#" class="link submenu-title">Gestion des utilisateurs</a>
                <a href="#" class="link">Web Design</a>
                <a href="#" class="link">Login Form</a>
                <a href="#" class="link">Card Design</a>
            </div>
        </li>
         -->
        
      </ul>
  </div>

  <!-- ====== main ======= -->
  

    <script src="dist/js/main.js"></script>
    <script src="dist/js/script.js"></script>
    <!-- ====== ionicons ======= -->

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
