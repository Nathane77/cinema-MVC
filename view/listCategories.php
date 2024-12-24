<?php ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount()?> categories.</p>

    <div class="cardContainer">
        <?php
            foreach($requete->fetchAll() as $category) { ?>
            <div class="card" onclick="window.location='index.php?action=categoryDetails&id=<?= $category['id_genre']?>'"> 
                <p><?= $category["genre_name"]?></p>
            </div> 
        <?php } ?>   
    </div>

    <div class="formContainer">
        <form class="formAddType" action="post" method="post" id="addtype">
            <label for="addtype">Add your own Category !</label><br>
            <input class="categoryInput" type="text" name="addType" id="addType" placeholder="Category Name"><br>
            <input  class="submitAddType" type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>

<?php
$titre = "Liste des categories";
$titre_secondaire = "Liste des categories";
$contenu = ob_get_clean();
require "view/template.php";