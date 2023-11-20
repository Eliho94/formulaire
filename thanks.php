<?php
$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Test "prénom"
    if(!isset($_POST['prenom']) || trim($_POST['prenom']) === '') {
        $errors[] = "Le prénom est obligatoire";
    } else {
        $prenom = htmlentities($_POST['prenom']);
    }

    // Test "nom"
    if(!isset($_POST['nom']) || trim($_POST['nom']) === '') {
        $errors[] = "Le nom est obligatoire";
    } else {
        $nom = htmlentities($_POST['nom']);
    }
    
    if(!isset($_POST['telephone']) || trim($_POST['telephone']) === ''){
        $errors[] = "Le champs 'Téléphone' est obligatoire";
    } else {
        $telephone = htmlentities($_POST['telephone']); 
    }

    if(!isset($_POST['user_email']) || trim($_POST['user_email']) === ''){
        $errors[] = "Le champs 'email' est obligatoire";
    } else if(( !filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL))) {
        $errors[] = "Syntaxe 'Email' invalide ";
    } else {
        $email = htmlentities($_POST['user_email']);
    }

    if(!isset($_POST['message']) || trim($_POST['message']) === ''){
        $errors[] = "Le champs 'Message' est obligatoire";
    } else {
        $message = htmlentities($_POST['message']);
    }

    if(!isset($_POST['sujet'])){
        $errors[] = "Le champs 'Sujet' est obligatoire";
    } else {
        $sujet = htmlentities($_POST['sujet']);
    }

    
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Remerciement</title>
    </head>

    <body>
        <div class="container">
            <h1>Remerciement !!!</h1>

            <!-- <?php // Affichage des éventuelles erreurs 
                if (count($errors) > 0) : ?>
                    <div class="msg_erreur">
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li style="color:red; font-size:18px"><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a class="btn" href="index.html">Retour formulaire</a>
                    </div> 
            <?php endif; ?> -->
            
            <p>Merci <b><?= $nom." ".$prenom ;?> </b>de nous avoir <br>
                contacté à propos de <b><?= $sujet;?></b>.
            </p>

            <p>Un de nos conseillers vous contactera soit à l’adresse <b><?= $email;?></b> ou par téléphone
                au <b><?= $telephone;?></b> dans les plus brefs délais pour traiter votre demande : 
            </p>

            <div>
                Votre message :<p> <i><?= $message ?></i></p>
            </div> 
        </div>   
    </body>
</html>