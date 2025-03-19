<?php
require_once('configuration.php');

// Vérifier s'il reste un emplacement libre
$nombre_images = count(array_filter($photos)); // Compte les images existantes
$upload_autorise = $nombre_images < 3;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Téléverser</title>
</head>
<body>
    <h1>Quelle photo ?</h1>

    <?php if ($upload_autorise): ?>
        <form action="resultat.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="524288" />
            <label for="photo">Fichier contenant une photo :</label>
            <input type="file" id="photo" name="ficphoto" accept="image/png, image/jpeg" required />
            <br><br>
            <input type="submit" value="Téléverser la photo" />
        </form>
    <?php else: ?>
        <p>Vous avez atteint la limite de 3 images.</p>
    <?php endif; ?>

    <hr>
    <h2>Images téléversées</h2>
    <?php foreach ($photos as $nom => $existe): ?>
        <?php if ($existe): ?>
            <div>
                <img src="<?= PHOTO_PATH . $nom ?>" alt="Photo" style="width:200px">
                <a href="<?= PHOTO_PATH . $nom ?>"> Voir photo</a>
                <form action="supprimer.php" method="post">
                    <input type="hidden" name="photo" value="<?= $nom ?>">
                    <button type="submit">Supprimer</button>
                </form>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <form action="supprimer.php" method="post">
    <select name="photo">
        <?php foreach ($photos as $nom => $existe): ?>
            <?php if ($existe): ?>
                <option value="<?= $nom ?>"><?= $nom ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
    <button type="submit">Supprimer</button>
</form>

</body>
</html>
