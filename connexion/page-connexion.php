<?php include('../articles/process_articles.php'); 

session_destroy();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/connexion.css">
</head>
<body>
    <?php

        if(isset($_GET['login_err'])) {
            $err = htmlspecialchars($_GET['login_err']); // reccupère les erreurs mis dans le Header, dans le if, dans connexion.php

            switch($err) { //le switch permet d'afficher les erreurs une par une 
                case 'password' : 
                    echo "Mot de passe incorrect";
                    break;

                case 'pseudo' :
                    echo "Pseudo incorrect";
                    break;

                case 'aleady' :
                    echo "Le compte n'existe pas";
                    break;
            }
        }

    ?>
    <div class="test-co">
        <div id="connexion_bloc">
            <div id="main" class="container">
                <h2 class="mt-5 mb-5 text-center">Connectez vous :</h2>
        
                <form class="mb-3" action="connexion.php" method="POST">
                    <div class="form-floating">
                        <input class="inp form-control" type="email" name="email" id="email" placeholder="Votre email" required>
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input class="inp form-control" type="password" name="password" id="password" placeholder="Votre mot de passe" required>
                        <label for="password">Password</label>
                    </div>
                    <input class="btn btn-success" type="submit" name="submit" value="Connexion">
                    <hr>
                </form>
                <script src="../lib/bootstrap/js/bootstrap.js"></script>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <p>Pour tester la connexion, utiliser <b>blog@admin.com</b> et mdp : <b>admin</b></p>
                </div>
                
                <a class="btn btn-dark" href="../index.php">Retour à l'accueil</a>
            </div>
        </div>
    </div>
    
        
    <!-- Scripts JS-->
    <script src="../lib/bootstrap/js/bootstrap.js"></script>

</body>
</html>