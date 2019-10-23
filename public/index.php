<?php
session_start();
require_once '../includes/config.php';

$pt = new PostTable();

if(!empty(($_GET['id']))){
    $getid = intval($_GET['id']);
    $pt->delete($getid);
    header('location:index.php');
}

if (isset($_SESSION['id'])){

  $userid = $_SESSION['id'];

  $user = $pt->recuperer_user($userid);
  
}

$posts = $pt->all();

?>

<!DOCTYPE html>
<html lang="en">
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


<!--Main Navigation-->
<header>

  <nav class="navbar navbar-expand-lg navbar-dark default-color">
    <a class="navbar-brand" href="index.php"><strong>Blog</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="connexion.php">Connexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="inscription.php">Inscription</a>
        </li>
      </ul>
    </div>
  </nav>

</header>
<!--Main Navigation-->

<a href='deconnexion.php'><button type="button" class="btn btn-danger">Se déconnecter</button></a>
      <p class="text-right">Connecté en tant que <?= $user['pseudo'] ?></p>
    <div class="container">
        <h1 class="text-center">Blog</h1>
  
        <a href="creation.php" class="btn btn-elegant">Création</a>
        <div class="row">

        


        
            <?php foreach($posts as $post): ?>
                <div class="col-md-4">

                <!-- Card -->
                <div class="card">

                <!-- Card image -->
                <div class="view overlay">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(67).jpg" alt="Card image cap">
                    <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body">

                    <!-- Title -->
                    <h2><?= $post['title'] ?></h2>
                    <!-- Text -->
                    <p><?= $post['content'] ?></p> 
                                       
                    <a href="modifier.php?id= <?= $post['id'] ?>" class="btn btn-elegant">Modifier</a>
                    <a href="index.php?id=<?= $post['id'] ?>" class="btn btn-elegant">Supprimer</a>
                    <p class="text-center"><a href="afficher.php?id= <?= $post['id'] ?>" class="btn btn-elegant">Afficher</a></p>

                </div>

                </div>
                <!-- Card -->
                    

                </div>
            <?php endforeach; ?>
        </div>
    </div>










    


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
