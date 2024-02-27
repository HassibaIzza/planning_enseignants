<?php 
require_once('conbase.php');
session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/login.css">
    <link rel="icon" href="images/UMAB logo.png" sizes="16x16" type="image/png">
    <title>Connexion</title>
    
</head>
<body>
<script>
        
    </script>
      <div class="container">
        <div class="box form-box">
            

            
            
            <header>Connexion</header>
            <form class="user" method="Post" action="ajax.php?function=login">
              
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Mot de passe </label>
                    <input type="password" name = "password"  id="password" autocomplete="off" required>
                </div>

                <div class="field input">
                  <select required name="userType" class="form-control mb-3">
                          <option value="">--Sélectionnez le rôle de l'utilisateur--</option>
                          <option value="Administrateur">Administrateur</option>
                          <option value="ChefDeparetement">Chef Deparetement</option>
                          <option value="ViceDoyen">Vice Doyen</option>
                        </select>
                    </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="Connexion" value="Connexion" required>
                </div>
                <div class="links">
                     <a href="accueil.html"> <b>&larr;</b>
                      Page d'accueil</a>
                </div>
            </form>


            <!--php-->
            <?php
  
  /*if(isset($_POST['Connexion'])){

    $userType = $_POST['userType'];
    $username = $_POST['username'];
    $password = $_POST['password'];

  
    $password = md5($password);

    if($userType == "Administrateur"){

      $query = "SELECT * FROM tbladmin WHERE emailAddress = '$username' AND password = '$password'";
      $rs = $con->query($query);
      $num = $rs->num_rows;
      $rows = $rs->fetch_assoc();

      if($num > 0){

        $_SESSION['userId'] = $rows['Id'];
        $_SESSION['firstName'] = $rows['firstName'];
        $_SESSION['lastName'] = $rows['lastName'];
        $_SESSION['emailAddress'] = $rows['emailAddress'];
        setcookie("abgrcs_admin_login", $rows["Id"], time()+3600, "/");
        

        header('location: index.php');
      }else{

        echo "<div class='alert alert-danger' role='alert' >
        Invalid Username/Password!
        </div>";

      }
    }
    else if($userType == "ChefDeparetement"){

      $query = "SELECT * FROM tbluser WHERE emailAddress = '$username' AND password = '$password'";
      $rs = $con->query($query);
      $num = $rs->num_rows;
      $rows = $rs->fetch_assoc();

      if($num > 0){

        $_SESSION['userId'] = $rows['Id'];
        $_SESSION['firstName'] = $rows['firstName'];
        $_SESSION['lastName'] = $rows['lastName'];
        $_SESSION['emailAddress'] = $rows['emailAddress'];
        $_SESSION['classId'] = $rows['classId'];
        $_SESSION['classArmId'] = $rows['classArmId'];
        setcookie("abgrcs_user_login", $rows["Id"], time()+3600, "/");
        
          header("Location: index_user.php");
        
      }

      else{

        echo "<div class='alert alert-danger' role='alert'>
        Invalid Username/Password!
        </div>";

      }
    } else if($userType == "ViceDoyen"){

      $query = "SELECT * FROM tblvicedoyen WHERE emailAddress = '$username' AND password = '$password'";
      $rs = $con->query($query);
      $num = $rs->num_rows;
      $rows = $rs->fetch_assoc();

      if($num > 0){

        $_SESSION['userId'] = $rows['Id'];
        $_SESSION['firstName'] = $rows['firstName'];
        $_SESSION['lastName'] = $rows['lastName'];
        $_SESSION['emailAddress'] = $rows['emailAddress'];

        

            header("Location: homeUser.php");

      }else{

        echo "<div class='alert alert-danger' role='alert'>
        Invalid Username/Password!
        </div>";

      }
    }


    else{

        echo "<div class='alert alert-danger' role='alert'>
        Invalid Username/Password!
        </div>";

    }
}*/
?>
            <!--php-->
        </div>
        
      </div>

      
</body>
</html>