<?php ob_start(); 

?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount()?> films.</p>

<div class="cardContainer">
        <?php
            foreach($requete->fetchAll() as $film) { ?>
            <div class="card" onclick="window.location='index.php?action=filmDetails&id=<?=$film['id_film']?>'"> 
                <div class="cardText">
                    <p><?= $film["film_title"]?></p>
                    <p>-</p>
                    <p><?= $film["film_date"]?></p>
                </div>
                <img class="cardPoster" src="public\img\posters\filmPosters\<?=$film['film_poster']?>" alt='poster of <?=$film['film_title']?>'>
            </div> 
        <?php } ?> 
    <button class="addFormButton" onclick="window.location='index.php?action=addFilmForm'">Ajouter votre propre film!</button>
    </div>


<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";