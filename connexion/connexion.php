<?php

    session_start();
    
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        
        $db = new PDO('mysql:host=localhost;dbname=wp_gp', 'grandprojet', 'grandprojet');
        
        $sql = "SELECT * FROM admin where email = '$email' ";
        $result = $db->prepare($sql);
        $result->execute();
        
        if($result->rowCount() > 0) // si l'utilisateur existe alors 
        {
            $data = $result->fetchAll();
            if(password_verify($pass, $data[0]['password'])) //verif si le mdp est le bon
            {
                $_SESSION['email'] = $email; //la personne connecté est $email
                Header ('location:landing.php');
            }
            else {
                header('location:page-connexion.php?reg_err=success'); //redirection
            }
        }
        else{ 
            
            header('location:page-connexion.php?reg_err=success');
            /* //sinon il sera ajouté automatiquement
            $pass = password_hash($pass, PASSWORD_DEFAULT); //hashage du mdp pour la sécurité 
            $sql = "INSERT INTO admin (email, password) VALUES ('$email', '$pass')";
            $req = $db->prepare($sql);
            $req->execute();
            echo "Enregistrement effectué";*/
        }
    }
    
    
?>


