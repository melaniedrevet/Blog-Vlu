<?php

if(isset($_GET["id"]) && !empty($_GET["id"])) { // SI la variable est set ET SI elle est pas vide alors...

    $sql = "SELECT * FROM articles WHERE id =" . $_GET["id"]; //on formule la requete
    $db = new PDO('mysql:host=localhost; dbname=wp_gp; charset=utf8', 'grandprojet', 'grandprojet');
    $request = $db->prepare($sql); // on prepare la requete
    $request = $db->query($sql);
    $article = $request->fetch(); // pas besoin de while, on à qu'un article sur la page
    if($request->rowCount() == 0) { // si l'ID de l'article n'existe pas alors...
        Header("Location:../index.php");
    }

}else {
    Header("Location:../index.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article["titre"]; ?></title>
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <nav class="mb-5 header navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand active" href="../index.php">
        <img class="logo" src="../../images/logo.png" alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav flex-wrap ms-md-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded=false>
              Signification
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php 
                  $db = new PDO('mysql:host=localhost; dbname=wp_gp; charset=utf8', 'grandprojet', 'grandprojet');
                  $sql = "SELECT * FROM articles WHERE categorie = 'signification' ORDER BY date DESC"; // on formule une requette sql qu'on stock dans $sql
                  $request = $db->query($sql); // on execute la requete ci dessus dans la db et on stock le resulat dans $request
                  while($row = $request->fetch()) { // temps qu'il y a des lignes dans la db on parcours la db pour l'afficher
                      ?>  
                          <li><a class="dropdown-item" href="article.php?id=<?= $row['id']; ?>"><?= $row["titre"]?></a></li>
                      <?php
                  }
              ?>
            </ul>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded=false>
              Continents
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php 
                  $db = new PDO('mysql:host=localhost; dbname=wp_gp; charset=utf8', 'grandprojet', 'grandprojet');
                  $sql = "SELECT * FROM articles WHERE categorie = 'continent' ORDER BY date DESC"; // on formule une requette sql qu'on stock dans $sql
                  $request = $db->query($sql); // on execute la requete ci dessus dans la db et on stock le resulat dans $request
                  while($row = $request->fetch()) { // temps qu'il y a des lignes dans la db on parcours la db pour l'afficher
                      ?>  
                          <li><a class="dropdown-item" href="article.php?id=<?= $row['id']; ?>"><?= $row["titre"]?></a></li>
                      <?php
                  }
              ?>
            </ul>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../pages/photos.php">Mes photos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/videos.php">Mes vidéos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/propos.php">A propos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    
  <div class="container">
        <h1 class="text-center mb-5"><?= $article["titre"]; ?></h1>
        <p><?= $article["edit"]; ?></p>
        <!--<p>Écrit par <?//= $article["auteur"] . " le " . $article["date"]; ?></p>
        <p> Catégorie de l'article : <?//= $article["categorie"] ?></p>-->
  </div>
     
        <nav class="navbar navbar-expand-lg navbar-dark">
          <div class="container-fluid">
            <a class="navbar-brand active" href="../connexion/page-connexion.php">Se connecter</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">Mentions légales</a>
                </li>
              </ul>
              <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
                <li class="nav-item">
                  <a class="nav-link" href="#"> Suivez mes aventures </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> <img src="../images/twitter.png" alt="twitter"/></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> <img src="../images/instagram.png" alt="instagram"/></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> <img src="../images/youtube.png" alt="youtube"/></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    
    <!-- Scripts JS-->
    <script src="../lib/bootstrap/js/bootstrap.js"></script>
</body>
</html>