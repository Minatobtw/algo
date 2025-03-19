<?php
require_once('configuration.php');

$msg_copier = '';

if (isset($_FILES["ficphoto"]) && ($_FILES["ficphoto"]["type"] === "image/png" || $_FILES["ficphoto"]["type"] === "image/jpeg") && $_FILES["ficphoto"]["error"] == UPLOAD_ERR_OK) {
    // Trouver le premier emplacement libre
    foreach ($photos as $nom => $existe) {
        if (!$existe) {
            $nouveau_fichier = PHOTO_PATH . $nom;
            break;
        }
    }

    if (isset($nouveau_fichier)) {
        if (move_uploaded_file($_FILES["ficphoto"]['tmp_name'], $nouveau_fichier)) {
            $msg_copier = '<p>Copie réussie</p>';
  $logmessage = "L'ajout de " . $_FILES["ficphoto"]["name"] . " s'est réalisé avec succès " . PHP_EOL; 


        } else {
            $msg_copier = '<p>Échec de la copie du fichier téléversé</p>';
            $logmessage = "L'ajout de " . $_FILES["ficphoto"]["error"] . " s'est mal réalisé " . PHP_EOL; 

        }
    } else {
        $msg_copier = '<p>Impossible d’ajouter une image supplémentaire.</p>';
        $logmessage = "Trop d'images " . PHP_EOL ; 

        
    }
} else {
    $msg_copier = '<p>C\'est la cata !!!</p>';
    $logmessage = "L'ajout de " . $_FILES["ficphoto"]["error"] . " s'est mal réalisé " . PHP_EOL; 

}

error_log($logmessage, 3, $logFile);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Résultat</title>
</head>
<body>
    <h1>Résultat</h1>
    <?php echo $msg_copier; ?>
    <p><a href="index.php">Retour</a></p>
</body>
</html>
