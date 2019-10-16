<?php

require_once '../includes/config.php';

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

$pt = new PostTable();

$id = $_GET['id'];

$objet = $pt->get($id);

if (!empty($_POST['modifier'])){
    if(!empty($_POST['title'] && !empty($_POST['content']))) {

        $post = new Post();
        $post->setTitle($_POST['title']);
        $post->setContent($_POST['content']);
        $post->setId($id);
        $pt->update($post);

        header('location:index.php');

    }
}



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
          <a class="nav-link" href="#">Connexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Inscription</a>
        </li>
      </ul>
    </div>
  </nav>

</header>
<!--Main Navigation-->
    <div class="container">
    <form action="" method="POST">
        <h1 class="text-center">Blog</h1>   
                <div class="md-form">
                    <input value="<?= $objet->getTitle()?>" name="title" type="text" id="form1" class="form-control">
                    <label for="form1">Titre</label>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea3">Contenu</label>
                    <textarea class="form-control" name="content" id="exampleFormControlTextarea3" rows="7"><?= $objet->getContent()?></textarea>
                </div>

                <input type="submit" name="modifier" value="modifier" class="btn btn-elegant">
            
            
            
                       <!-- Material input -->
             
            </form>
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
