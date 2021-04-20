<html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Vidéos</title>
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/page.css">
      <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">
  </head>
  <body>
    <header class="videos">
      <div class="container-titre">
        <h1>Mes vidéos</h1>
      </div>

      <nav class="mb-5 header navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand active" href="../index.php">
          <img class="logo" src="../images/logo.png" alt="logo">
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
                            <li><a class="dropdown-item" href="../../articles/article.php?id=<?= $row['id']; ?>"><?= $row["titre"]?></a></li>
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
                            <li><a class="dropdown-item" href="../../articles/article.php?id=<?= $row['id']; ?>"><?= $row["titre"]?></a></li>
                        <?php
                    }
                ?>
              </ul>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="photos.php">Mes photos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="videos.php">Mes vidéos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="propos.php">A propos</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    
    <div class="container pagevideos">
      <p class="mt-5">Les différents types de saluts dans le monde</p>
      <div class="video">
        <iframe width="1200px" height="600px" src="https://www.youtube.com/embed/GKDvbKT8IRM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <p class="mt-5">Animation du logo - Motion Design</p>
      <div class="video mb-5">
        <iframe width="1200px" height="600px" src="https://www.youtube.com/embed/Hy9-8bGYZ0c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
    
    
    <footer>
        <nav class="navbar navbar-expand-lg navbar-dark">
          <div class="container-fluid">
            <a class="navbar-brand active" href="../../connexion/page-connexion.php">Se connecter</a>
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
                  <a class="nav-link" href=""> Suivez mes aventures </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://twitter.com/?lang=fr" target="_blank"> <img src="../images/twitter.png" alt="twitter"/></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://www.instagram.com/?hl=fr" target="_blank"> <img src="../images/instagram.png" alt="instagram"/></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://www.youtube.com/" target="_blank"> <img src="../images/youtube.png" alt="youtube"/></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    </footer>
        <script src="../lib/bootstrap/js/bootstrap.js"></script>
  </body>
</html>