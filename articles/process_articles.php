<?php


session_start();

// connexion à la base 

try { // on tente la connexion, si elle c'est réussi alors...
        $mysqli = new PDO('mysql:host=localhost; dbname=wp_gp; charset=utf8', 'grandprojet', 'grandprojet'); //chaine de connexion à la base (PDO représente la connexion entre le php et la db)
        //echo "Vous êtes connecté à la base de données !" . "</br>";
    }catch(Exception $e) { // si la connexion échoue alors...
        die('Erreur : ' . $e->getMessage()); // affiche le message d'erreur
    }


// Ajout d'article dans significations

if (isset($_POST["titre"], $_POST["categorie"], $_POST["edit"]) && !empty($_POST["titre"]) && !empty($_POST["categorie"]) && !empty($_POST["edit"]) && !empty($_POST["auteur"])){ // le isset détermine si une variable est déclarée. Le !empty est une sécurité pour le formulaire (le if vérifie que les input correspondent bien)

    $titre = $_POST["titre"]; 
    $cat = $_POST["categorie"];
    $edit = $_POST["edit"];
    $auteur = $_POST["auteur"];
    $now = date("Y-m-d H:i:s");

    $sql = "INSERT INTO articles (titre, categorie, edit, auteur, date) VALUES (:titre, :categorie, :edit, :auteur, :date)"; // Permet d'inserer du contenu dans la db grace au formulaire
    $request = $mysqli->prepare($sql);
    $request->bindParam(':titre', $titre);
    $request->bindParam(':categorie', $cat);
    $request->bindParam(':edit', $edit);
    $request->bindParam(':auteur', $auteur);
    $request->bindParam(':date', $now);
    $request->execute();
        
    $_SESSION['messageAjout'] = "L'article : $titre à été ajouté !";
    header("Location: ../connexion/landing.php");
}

// Suppression d'article

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = $mysqli->prepare("DELETE FROM articles WHERE id=$id LIMIT 1") or die($mysqli->error());
    $sql->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    
    $executeIsOk = $sql->execute();

    if($executeIsOk) { //si executeIsOk est vrai alors...

        $_SESSION['message'] = 'Article supprimé avec succés !';
        header("location: ../connexion/landing.php");
    
    }else {
        echo "Échec de la suppression de l'article";
    }
}

// Modification d'article

if (isset($_GET['update'])) {
    
    $id = $_GET['update'];
    
    $titre = $_POST["titre"]; 
    $cat = $_POST["categorie"];
    $edit = $_POST["edit"];
    $auteur = $_POST["auteur"];
    $now = date("Y-m-d H:i:s");
    
    $sql = $mysqli->prepare("UPDATE articles SET titre = $titre, categorie = $cat, edit = $edit, auteur = $auteur, date = $now WHERE id = $id") or die($mysqli->error());
    $sql = $mysqli->prepare("DELETE FROM articles WHERE id=$id LIMIT 1") or die($mysqli->error());
    
    $executeIsOk = $sql->execute(array(
        'titre'=>$titre,
        'cat'=>$cat,
        'edit'=>$edit,
        'auteur'=>$auteur,
        'now'=>$now,
        'id'=>$id
    ));

     $sql->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

     $executeIsOk = $sql->execute();

    if($executeIsOk) { //si executeIsOk est vrai alors...

        $_SESSION['message'] = 'Article modifié avec succès !';
        header("location: ../connexion/landing.php");
    
    }else {
        echo "Échec de la modification de l'article";
    }
}