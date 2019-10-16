<?php


require_once '../includes/config.php';

$pt = new PostTable();

$title = ($_GET['id']);

$objet = $pt->get($title);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>modifier</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <p><?= $objet->getTitle() ?></p>

    </br>
    </br>
    </br>
    </br>
    </br>
    <p><?= $objet->getContent() ?></p>
         

</body>
</html>