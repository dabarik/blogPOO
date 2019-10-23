<?php 

session_start();


require_once '../includes/config.php';

$pt = new PostTable();


if (!empty($_POST['submit'])){
  if(!empty($_POST['mail'] && !empty($_POST['mdp']))){

      $post = new Post();
      $post->setMail($_POST['mail']);
      $post->setMdp($_POST['mdp']);
      $conn = $pt->connexion($post);
      
      
      $nb_con = $conn->rowcount();  

      if ($nb_con == 1){

          $userinfo = $conn->fetch();

          $_SESSION['id'] = $userinfo['id'];

          header('location:index.php');
      }
      else{
          $error = 'Identifiants ou mdp incorrects';
      }
  }
  else{
      $error = 'Veuillez compléter les champs';
  }
}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BLOGPOO</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.8/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<!-- DEBUT DU PROJET-->

<div class="containter-fluid">
  <div class="container">
      <div class="col-md-6">


<!-- Material form login -->
<div class="card">

  <h5 class="card-header info-color white-text text-center py-4">
    <strong>Connexion</strong>
  </h5>

  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form method="POST" class="text-center" style="color: #757575;">

      <!-- Email -->
      <div class="md-form">
        <input type="text" id="mail" name="mail" class="form-control">
        <label for="mail">E-mail</label>
      </div>
  
      <!-- Password -->
      <div class="md-form">
        <input type="password" id="mdp" name="mdp" class="form-control">
        <label for="mdp">Mot de passe</label>
      </div>


      <!-- Sign in button -->
      <input class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" id="submit" name="submit" value="Se connecter">

      <!-- Register -->
      <p>Toujours pas membre ?
        <a href='inscription.php'>Inscription</a>
      </p>


    </form>
    <!-- Form -->

  </div>

</div>
<!-- Material form login -->


<?php

if (isset($error))
{
?>
  <div class="alert alert-danger" role="alert">
    <?= $error ?>
  </div>
  <?php
}
?>

        </div>

    </div>
</div>


<!-- /FIN DU PROJET-->


    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.8/js/mdb.js"></script>
    <!-- VueJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <!-- SCRIPTS -->
    <script src="js/app.js"></script>
    <script src="js/script.js"></script>
</body>

</html>