<?php

    session_start(); 
    if(!isset($_SESSION['email'])) {
        Header('location:page-connexion.php');
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de <?php echo $_SESSION['email']; ?></title>
   
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css"/>

</head>
<body>
    
    <div class="container-fluid header mb-5">
        <h3 class="pt-3 mb-3">Bonjour <?php echo $_SESSION['email']; ?> !</h3>
        <a class="mb-3 btn btn-dark" href="deconnexion.php">Déconnexion</a>
    </div>
    
    <div class="container-fluid">
        <div class="container">
            
            <!-- message quand l'article est supprimé -->
            <?php if (isset($_SESSION['message'])): ?> 
              <p style="background-color: #198754; padding: 10px;"><?= $_SESSION['message']; ?> </p>
            <?php  unset($_SESSION['message']);
              endif; ?>
            
            <!-- message quand un article est ajouté -->
            <?php if (isset($_SESSION['messageAjout'])): ?> 
              <p style="background-color: #198754; padding: 10px;"><?= $_SESSION['messageAjout']; ?> </p>
            <?php  unset($_SESSION['messageAjout']);
              endif; ?>
          
            <div class="formulaire">
              <h2 class="mb-4">Ajouter un article :</h2>
                <form class="form_articles" method="POST" action="../articles/process_articles.php">
                    <input class="form-control mb-3" type="text" name="titre" id="titre" value="" placeholder="Titre">
                    <select name="categorie" class="form-select mb-3">
                      <option value="" selected>- Choisir une catégorie -</option>
                      <option value="signification">Signification</option>
                      <option value="continent">Continent</option>
                      <option value="militaire">Militaire</option>
                      <option value="pandemie">Pandémie</option>
                    </select>
                    <textarea name="edit" id="mytextarea" value="" placeholder="Votre article"></textarea>
                    <input class="form-control mt-3" type="text" name="auteur" id="auteur" value="" placeholder="Auteur">
                    <input class="mt-3 btn btn-success" type="submit" name="submit" value="Poster">
                </form>
                <h3 class="mt-5 mb-3">Aperçu des articles :</h3>
                
                <!--<ol>
                <?php /*
                    $db = new PDO('mysql:host=localhost; dbname=wp_gp; charset=utf8', 'grandprojet', 'grandprojet');
                    $sql = "SELECT * FROM articles ORDER BY date DESC"; // on formule une requette sql qu'on stock dans $sql
                    $request = $db->query($sql); // on execute la requete ci dessus dans la db et on stock le resulat dans $request
                    while($row = $request->fetch()) { // temps qu'il y a des lignes dans la db on parcours la db pour l'afficher
                        ?> 
                            <li><a style="text-decoration: none;" href="../articles/article_admin.php?id=<?= $row['id']; ?>"><?= $row["titre"]?></a></br>
                            Écrit par <b><?= $row['auteur']; ?></b> le <b><?= $row['date']; ?></b>
                            </br>De catégorie <b><?= $row["categorie"]; ?></b></li>
                        <?php
                    }*/
                ?>
                </ol>-->
                
                <div class="accordion mb-5" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Signification
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <?php 
                          $db = new PDO('mysql:host=localhost; dbname=wp_gp; charset=utf8', 'grandprojet', 'grandprojet');
                          $sql = "SELECT * FROM articles WHERE categorie = 'signification' ORDER BY date DESC"; // on formule une requette sql qu'on stock dans $sql
                          $request = $db->query($sql); // on execute la requete ci dessus dans la db et on stock le resulat dans $request
                          while($row = $request->fetch()) { // temps qu'il y a des lignes dans la db on parcours la db pour l'afficher
                              ?> 
                                  <li><a style="text-decoration: none;" href="../articles/article_admin.php?id=<?= $row['id']; ?>"><?= $row["titre"]?></a></br>
                                  Écrit par <b><?= $row['auteur']; ?></b> le <b><?= $row['date']; ?></b>
                                  </br>De catégorie <b><?= $row["categorie"]; ?></b></li>
                              <?php
                          }
                      ?>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Continent
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <?php 
                          $db = new PDO('mysql:host=localhost; dbname=wp_gp; charset=utf8', 'grandprojet', 'grandprojet');
                          $sql = "SELECT * FROM articles WHERE categorie = 'continent' ORDER BY date DESC"; // on formule une requette sql qu'on stock dans $sql
                          $request = $db->query($sql); // on execute la requete ci dessus dans la db et on stock le resulat dans $request
                          while($row = $request->fetch()) { // temps qu'il y a des lignes dans la db on parcours la db pour l'afficher
                              ?> 
                                  <li><a style="text-decoration: none;" href="../articles/article_admin.php?id=<?= $row['id']; ?>"><?= $row["titre"]?></a></br>
                                  Écrit par <b><?= $row['auteur']; ?></b> le <b><?= $row['date']; ?></b>
                                  </br>De catégorie <b><?= $row["categorie"]; ?></b></li>
                              <?php
                          }
                      ?>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Militaire
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <?php 
                          $db = new PDO('mysql:host=localhost; dbname=wp_gp; charset=utf8', 'grandprojet', 'grandprojet');
                          $sql = "SELECT * FROM articles WHERE categorie = 'militaire' ORDER BY date DESC"; // on formule une requette sql qu'on stock dans $sql
                          $request = $db->query($sql); // on execute la requete ci dessus dans la db et on stock le resulat dans $request
                          while($row = $request->fetch()) { // temps qu'il y a des lignes dans la db on parcours la db pour l'afficher
                              ?> 
                                  <li><a style="text-decoration: none;" href="../articles/article_admin.php?id=<?= $row['id']; ?>"><?= $row["titre"]?></a></br>
                                  Écrit par <b><?= $row['auteur']; ?></b> le <b><?= $row['date']; ?></b>
                                  </br>De catégorie <b><?= $row["categorie"]; ?></b></li>
                              <?php
                          }
                      ?>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Pandémie
                      </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <?php 
                          $db = new PDO('mysql:host=localhost; dbname=wp_gp; charset=utf8', 'grandprojet', 'grandprojet');
                          $sql = "SELECT * FROM articles WHERE categorie = 'pandemie' ORDER BY date DESC"; // on formule une requette sql qu'on stock dans $sql
                          $request = $db->query($sql); // on execute la requete ci dessus dans la db et on stock le resulat dans $request
                          while($row = $request->fetch()) { // temps qu'il y a des lignes dans la db on parcours la db pour l'afficher
                              ?> 
                                  <li><a style="text-decoration: none;" href="../articles/article_admin.php?id=<?= $row['id']; ?>"><?= $row["titre"]?></a></br>
                                  Écrit par <b><?= $row['auteur']; ?></b> le <b><?= $row['date']; ?></b>
                                  </br>De catégorie <b><?= $row["categorie"]; ?></b></li>
                              <?php
                          }
                      ?>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
        
    <style type="text/css">
    .header {
      width: 100%;
      background-color: #324e38;
    }
    
    .header h3 {
      color: white;
    }
    
      form {
    display: flex;
    flex-direction: column;
    }
    
    .form_articles {
        background-color:  #f0f0f0 ;
        padding: 30px;
        border-radius: 10px;
    }
    
    .container h2 {
        text-align: center;
        color: #324E38;
    }
    </style>

<!-- Import jQuery -->
<script type="text/javascript" src="../lib/jquery.js"></script>
<script type="text/javascript" src="../lib/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../lib/tinymce/js/tinymce/tinymce.min.js"></script>

<script>
  tinymce.init({
  selector: 'textarea#mytextarea',
  height: 500,
 
  powerpaste_block_drop: false,
  menubar: true,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  images_upload_url: 'postAcceptor.php',
  images_upload_handler: function (blobInfo, success, failure) {
    setTimeout(function () {
      /* no matter what you upload, we will turn it into TinyMCE logo :)*/
      success('http://moxiecode.cachefly.net/tinymce/v9/images/logo.png');
    }, 2000);
  },
  toolbar: 'undo redo | image code | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});

</script>

</body>
</html>

