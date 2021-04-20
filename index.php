<?php 
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carnet de salutations</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./lib/flexslider/flexslider.css">
</head>
<body>
    <header class="index">
        <?php include('menu.php'); ?>
        <div class="container-titre">
            <h1>Les façons de saluer dans le monde</h1>
        </div>
    </header>
    <div class="container">
        <div class="row mb-5">
            <h2> Pourquoi se salue-t-on ?</h2>
            <div class="col-md-6 col-12 text-center">
                <h4 class="mb-4">Engagement</h4>
                <p>La politesse est entrée dans notre éducation et dans notre culture, c’est la seule chose
                gratuite qu’on peut offrir à l’autre, alors dire bonjour, merci et au revoir n’est pas une 
                option et c’est un signe de politesse.</p>
            </div>
            <div class="col-md-6 col-12 text-center">
                <h4 class="mb-4">Respect et affinité</h4>
                <p>Lorsqu’on salue quelqu’un, on réaffirme son respect et son affinité envers cette personne.
                On montre que cette personne compte à nos yeux, et qu’elle a une place dans un groupe social.</p>
            </div>
            <div class="plus mt-3">
                <?php
                  $db = new PDO('mysql:host=localhost; dbname=wp_gp; charset=utf8', 'grandprojet', 'grandprojet');
                  $sql = "SELECT * FROM articles WHERE id = '41'"; // on formule une requette sql qu'on stock dans $sql
                  $request = $db->query($sql); // on execute la requete ci dessus dans la db et on stock le resulat dans $request
                  while($row = $request->fetch()) { // temps qu'il y a des lignes dans la db on parcours la db pour l'afficher
                      ?>  
                          <a href="./articles/article.php?id=<?= $row['id']; ?>">En savoir plus</a>
                      <?php
                  }
              ?>
            </div>
        </div>
        <div class="carte">
            <h2> Choisissez votre destination !</h2>
            <div id="map"></div>
        </div>
        <div>
            <h2>Les derniers articles</h2>
            <div class="row articles">
                <div class="col-md-6 col-12">
                    <p> Le salut militaire </p>
                    <img width="100%" src="images/militaire.jpg" alt="militaire"/>
                    <div class="plus mt-3">
                        <?php
                          $db = new PDO('mysql:host=localhost; dbname=wp_gp; charset=utf8', 'grandprojet', 'grandprojet');
                          $sql = "SELECT * FROM articles WHERE categorie = 'militaire' ORDER BY date DESC"; // on formule une requette sql qu'on stock dans $sql
                          $request = $db->query($sql); // on execute la requete ci dessus dans la db et on stock le resulat dans $request
                          while($row = $request->fetch()) { // temps qu'il y a des lignes dans la db on parcours la db pour l'afficher
                              ?>  
                                  <a href="./articles/article.php?id=<?= $row['id']; ?>">En savoir plus</a>
                              <?php
                          }
                      ?>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <p> Le salut aujourd'hui </p>
                    <img width="100%" src="images/masque.jpg" alt="masque"/>
                    <div class="plus mt-3">
                        <?php
                          $db = new PDO('mysql:host=localhost; dbname=wp_gp; charset=utf8', 'grandprojet', 'grandprojet');
                          $sql = "SELECT * FROM articles WHERE categorie = 'pandemie' ORDER BY date DESC"; // on formule une requette sql qu'on stock dans $sql
                          $request = $db->query($sql); // on execute la requete ci dessus dans la db et on stock le resulat dans $request
                          while($row = $request->fetch()) { // temps qu'il y a des lignes dans la db on parcours la db pour l'afficher
                              ?>  
                                  <a href="./articles/article.php?id=<?= $row['id']; ?>">En savoir plus</a>
                              <?php
                          }
                      ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="slider">
            <h2>Galerie photos</h2>
            <div class="flexslider">
                <ul class="slides">
                    <li data-thumb="./images/photos/large/salutmilitaire.png">
                      <img class="img" src="./images/photos/large/salutmilitaire.png" />
                      <p class="flex-caption">Le salut militaire</p>
                    </li>
                    <li data-thumb="./images/photos/large/japonais.png">
                      <img class="img" src="./images/photos/large/japonais.png" />
                      <p class="flex-caption">Le salut japonais</p>
                    </li>
                    <li data-thumb="./images/photos/large/ugh.png">
                      <img class="img" src="./images/photos/large/ugh.png" />
                      <p class="flex-caption">Le salut des Indiens des Plaines</p>
                    </li>
                    <li data-thumb="./images/photos/large/poignee.png">
                      <img class="img" src="./images/photos/large/poignee.png" />
                      <p class="flex-caption">Le salut militaire</p>
                    </li>
                </ul>
            </div>
            <div class="decouvrir mb-5">
                <a href="./pages/photos.php">Découvrir plus de photos</a>
            </div>
        </div>
        <div class="container">
        <div>
            <h2> Mes vidéos</h2>
            <div class="video">
                <iframe width="1200px" height="600px" src="https://www.youtube.com/embed/GKDvbKT8IRM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="decouvrir">
                <a href="./pages/videos.php">Découvrir plus de vidéos</a>
            </div>
        </div>
        <div>
            <h2>A propos</h2>
            <div class="row mb-5">
                <div class="col-md-6 col-12">
                    <img width="100%" src="images/profil.jpg" alt="profil"/>
                </div>
                <div class="col-md-6 col-12 profil">
                    <h3>Moi, c'est Jocelyn !</h3>
                    <h4> Le créateur du blog </h4>
                    <p> Passionné par la culture depuis mon plus jeune âge, 
                    j’ai décidé de partager mes connaissances sur le monde.</p>
                    <div class="plus mt-3">
                        <a href="./pages/propos.php">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
        <?php include('footer.php'); ?>
    </footer>
    
    <!-- Scripts JS-->
    <script src="./lib/bootstrap/js/bootstrap.js"></script>
    <script src="./lib/jquery-3.5.1.min.js"></script>
    <script src="./lib/worldmap/mapdata.js"></script>
    <script src="./lib/worldmap/worldmap.js"></script>
    <script src="./lib/flexslider/jquery.flexslider.js"></script>
    <script>
        $(document).ready(function() {
        	$('.flexslider').flexslider({
        		animation: "slide",
        		controlNav: "thumbnails",
        		directionNav: false
        	});
        });
    </script>
</body>
</html>