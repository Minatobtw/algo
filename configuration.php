<?php
define('PHOTO_PATH', 'img/'); // Répertoire des images

// Charger les images existantes
$photos = [
    'image1.jpg' => file_exists(PHOTO_PATH . 'image1.jpg'),
    'image2.jpg' => file_exists(PHOTO_PATH . 'image2.jpg'),
    'image3.jpg' => file_exists(PHOTO_PATH . 'image3.jpg')
];

$logFile = "logs/logs.log"; 
$logmessage = "";
?>
