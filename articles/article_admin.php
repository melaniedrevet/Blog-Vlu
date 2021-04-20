<?php

if(isset($_GET["id"]) && !empty($_GET["id"])) { // SI la variable est set ET SI elle est pas vide alors...

    $sql = "SELECT * FROM articles WHERE id =" . $_GET["id"]; //on formule la requete
    $db = new PDO('mysql:host=localhost; dbname=wp_gp; charset=utf8', 'grandprojet', 'grandprojet');
    $request = $db->prepare($sql); // on prepare la requete
    $request = $db->query($sql);
    $article = $request->fetch(); // pas besoin de while, on à qu'un article sur la page
    if($request->rowCount() == 0) { // si l'ID de l'article n'existe pas alors...
        Header("Location:./connexion/landing.php");
    }

}else {
    Header("Location:./connexion/landing.php");
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
    <!--<link rel="stylesheet" href="../css/style.css">-->
</head>
<body>
    <div class="container">
        <div class="mt-3">
            <a class="btn btn-primary" href="../connexion/landing.php">Retour</a>
            <a class="btn btn-danger" href="process_articles.php?delete=<?= $article['id']?>">Supprimer l'article</a> 
        </div>
        
        <h1 class="text-center"><?= $article["titre"]; ?></h1>
        <p><?= $article["edit"]; ?></p>
        <p>Écrit par <?= $article["auteur"] . " le " . $article["date"]; ?></p>
        
        
        <div class="accordion mb-3">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Modifier l'article
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                  <div class="accordion-body">
            
                    <form method="POST" action="process_articles.php?update=<?= $article['id']?>">
                        <input class="form-control mb-3" type="text" name="titre" id="titre" value="" placeholder="<?= $article["titre"]?>">
                        <select name="categorie" class="form-select mb-3">
                          <option value="signification">Signification</option>
                          <option value="continent">Continent</option>
                          <option value="militaire">Militaire</option>
                          <option value="pandemie">Pendant la pandémie</option>
                        </select>
                        <textarea name="edit" id="mytextarea" value="" placeholder="<?= $article["edit"]?>"></textarea>
                        <input class="form-control mt-3" type="text" name="auteur" id="auteur" value="" placeholder="<?= $article["auteur"]?>">
                        <input class="mt-3 btn btn-success" type="submit" name="submit" value="Modifier">
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Scripts JS-->
    <script type="text/javascript" src="../lib/jquery.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.js"></script>
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
