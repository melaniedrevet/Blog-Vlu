<html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Galerie Photos</title>
      <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="../css/page.css">
      <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">
      <link rel="stylesheet" href="../lib/grid/css/demo.css" type="text/css" />
      <link rel="stylesheet" href="../lib/grid/css/component.css" type="text/css" />
      <link rel="stylesheet" href="../lib/grid/css/elastic_grid.css" type="text/css" />
  </head>
  <body>
    <header class="photos">
      <div class="container-titre">
        <h1>Mes photos</h1>
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
    

    <div class="mt-5 mb-5" id="grid-photo"></div>   
    
    
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
  <!--  <script src="../lib/jquery.js"></script>-->
    <script src="../lib/grid/js/grid-jquery.js"></script>
    <script src="../lib/grid/js/classie.js"></script>
    <script src="../lib/grid/js/elastic_grid.js"></script>
    <script src="../lib/grid/js/modernizr.custom.js"></script>
    <script src="../lib/grid/js/jquery.hoverdir.js"></script>
    <script src="../lib/grid/js/jquery.elastislide.js"></script>
    
    
    <script type="text/javascript">
      $(function() {
        $("#grid-photo").elastic_grid({
          'showAllText' : 'Tout',
          'filterEffect': 'scaleup',
          'hoverDirection': true,
          'hoverDelay': 0,
          'hoverInverse': false,
          'expandingSpeed': 500,
          'expandingHeight': 500,
          'items' : 
          [
            // Première ligne
            {
              'title'         : 'La poignée de main',
              'description'   : `En effet, de nos jours la façon de se dire bonjour la plus commune 
              dans le monde occidental est la poignée de main. Tout le monde se dit bonjour de cette 
              manière au moins une fois dans sa vie. La poignée de main est utilisée par les enfants, 
              les amis et dans le monde professionnel pour se saluer. Elle peut aussi avoir pour signification 
              un remerciement ou un marché conclu.`,
              'thumbnail'     : ['../images/photos/small/poignee.png'],
              'large'         : ['../images/photos/large/poignee.png'],
              'img_title'     : ['poigneedemain'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=37', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts communs']
            },
            {
              'title'         : 'Le salut des Indiens des plaines',
              'description'   : `Les Indiens des plaines sont les peuples composés de diverses tribus, qui occupaient les grandes 
              plaines d’Amérique du Nord avant la colonisation européenne. La façon de saluer la plus courante et  la plus connue 
              qu’utilisent les Indiens des plaines est évidemment « Ugh » signifiant « Salut à toi » en sioux. C’est un salut de 
              reconnaissance et de respect. « Ugh » se prononce haut et fort, en levant une main, la paume ouverte vers l’avant.`,
              'thumbnail'     : ['../images/photos/small/ugh.png'],
              'large'         : ['../images/photos/large/ugh.png'],
              'img_title'     : ['salutsindiens'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=53', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts traditionnels']
            },
            {
              'title'         : 'Le salut militaire',
              'description'   : `Le salut militaire fut d’abord le signe de paix et de fraternité 
              échangé, de loin, par deux voyageurs qui se rencontraient. En élevant leur main droite 
              largement ouverte, ils montraient l’un à l’autre l’absence d’armes dans leur main. 
              L’origine remonterait à l’Antiquité. Il s’agissait avant tout d’un signe de paix. `,
              'thumbnail'     : ['../images/photos/small/salutmilitaire.png'],
              'large'         : ['../images/photos/large/salutmilitaire.png'],
              'img_title'     : ['salutmilitaire'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=44', 'new_window' : false }
                        
                    ],
              'tags'          : ['Saluts communs']
            },
            {
              'title'         : 'Le salut Japonais',
              'description'   : `À l’inverse de notre culture européenne, dans le 
              continent asiatique et plus précisément au Japon, il est conseillé 
              de garder une certaine distance pour se saluer. Le salut japonais est une 
              des formes de politesse les plus importantes et fondamentales de la culture nippone.`,
              'thumbnail'     : ['../images/photos/small/japonais.png'],
              'large'         : ['../images/photos/large/japonais.png'],
              'img_title'     : ['salutjaponais'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=57', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts traditionnels']
            },
            // Deuxième ligne
            {
              'title'         : 'Le salut des Premières Nations',
              'description'   : `Les Amérindiens ou membres des premières Nations sont les peuples habitant 
              l’Amérique qui était présente avant la colonisation européenne et leurs descendants. Les peuples 
              amérindiens occupent la totalité des Amériques que ce soit Amérique du Nord, Amérique centrale, 
              Amérique du Sud, ainsi que les Caraïbes. Mais aujourd’hui nous allons nous concentrer sur les peuples 
              habitant uniquement le continent nord-américain.`,
              'thumbnail'     : ['../images/photos/small/premierenation.png'],
              'large'         : ['../images/photos/large/premierenation.png'],
              'img_title'     : ['salutamerindien'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=53', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts traditionnels']
            },
            {
              'title'         : 'Coucou',
              'description'   : `Une des manières de se dire bonjour les plus sécurisées est tout simplement le salut de la main levée.
              Bien sûr, le salut de la main, plus communément appelé "faire coucou" est une façon de se dire bonjour que les enfants utilisent ou qui 
              te sert quand tu salues des personnes de loin`,
              'thumbnail'     : ['../images/photos/small/coucou.png'],
              'large'         : ['../images/photos/large/coucou.png'],
              'img_title'     : ['coucou'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=58', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts communs']
            },
            {
              'title'         : 'Le salut Malaisien',
              'description'   : `La région du Pacifique est peut-être la région du monde la plus diversifiée 
              sur le plan culturel avec pour cause, ça très lente colonisation par les peuples venus d’Asie du
              Sud à l’antiquité qui se sont mélangés avec les populations déjà présentes depuis la préhistoire 
              qui étaient déjà culturellement variés, car répartie sur un très grand nombre d’îles.`,
              'thumbnail'     : ['../images/photos/small/malaisie.png'],
              'large'         : ['../images/photos/large/malaisie.png'],
              'img_title'     : ['salutmalaisie'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=52', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts traditionnels']
            },
            {
              'title'         : 'Le salut au Sénégal',
              'description'   : `Au Sénégal, la main est l'un des membres essentiels de la communication.`,
              'thumbnail'     : ['../images/photos/small/senegal.png'],
              'large'         : ['../images/photos/large/senegal.png'],
              'img_title'     : ['salutsenegal'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=55', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts traditionnels']
            },
            // Troisième ligne
            {
              'title'         : 'Le salut Africain',
              'description'   : `Le continent africain est à la fois vaste et plein de contrastes.
              Dans toutes les sociétés africaines, la salutation occupe une place de choix dans les 
              relations sociales. Elle est même le rituel qui annonce toute conversation. Son absence 
              ou la baisse de sa ferveur dans un milieu africain est mal perçue et s’interprète comme 
              un signe de conflit entre les hommes.`,
              'thumbnail'     : ['../images/photos/small/sawabona.png'],
              'large'         : ['../images/photos/large/sawabona.png'],
              'img_title'     : ['salutafricain'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=55', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts traditionnels']
            },
            {
              'title'         : 'Se dire bonjour',
              'description'   : `La solution la plus évidente, même si elle peut paraître impersonnelle, austère et
              manquer de chaleur humaine pour certaines personnes est de tout simplement se dire bonjour.`,
              'thumbnail'     : ['../images/photos/small/bonjour.png'],
              'large'         : ['../images/photos/large/bonjour.png'],
              'img_title'     : ['bonjour'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=58', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts communs']
            },
            {
              'title'         : 'Le check de coude',
              'description'   : `Le check du coude consiste, comme son nom l'indique, à percuter les extrémitées de nos coudes pour se saluer.`,
              'thumbnail'     : ['../images/photos/small/coude.png'],
              'large'         : ['../images/photos/large/coude.png'],
              'img_title'     : ['checkcoude'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=58', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts communs']
            },
            {
              'title'         : 'Le check de main',
              'description'   : `La poignée de mains a su se réinventer et se transformer depuis 
              quelques années avec une personnalisation appartenant à chaque personne ou à chaque 
              groupe d’individus avec le check.`,
              'thumbnail'     : ['../images/photos/small/check.png'],
              'large'         : ['../images/photos/large/check.png'],
              'img_title'     : ['checkmain'],
              'button_list'   :
                    [
                        { 'title':'En savoir plus', 'url' : 'https://6d456eb5ca534bce8741561f31cdcf9b.vfs.cloud9.us-east-1.amazonaws.com/articles/article.php?id=58', 'new_window' : false }
                      
                    ],
              'tags'          : ['Saluts communs']
            },
          ]
        });
      });
      
    </script>
  </body>
</html>