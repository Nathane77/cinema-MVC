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
                    <div class="cardCategoryText">
                    <p class="categoryText"><?= $category["genre_name"]?></p>
                    <p>-</p>
                    <p class="categoryTitle"><?= $category["film_title"]?></p>
                </div>
                <img class="cardCategoryPoster" src="public\img\posters\filmPosters\<?=$category['film_poster']?>" alt='poster of <?=$category['film_title']??""?>'>

                </div>

            <?php } ?>   
    </div>
    <button class="addFormButton" onclick="window.location='index.php?action=addCategoryForm'">Ajouter votre propre categorie!</button>   

</body>
</html>

<?php
$titre = "Liste des categories";
$titre_secondaire = "Liste des categories";
$contenu = ob_get_clean();
require "view/template.php";