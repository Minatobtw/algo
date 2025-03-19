<?php
require_once('configuration.php');

if (isset($_POST['photo']) && array_key_exists($_POST['photo'], $photos)) {
    $fichier = PHOTO_PATH . $_POST['photo'];
    if (file_exists($fichier)) {
        unlink($fichier);
        $message = "L'image a été supprimée.";
    } else {
        $message = "L'image n'existe pas.";
    }
} else {
    $message = "Aucune image spécifiée.";
}

header("Location: index.php?message=" . urlencode($message));
exit;
?>
