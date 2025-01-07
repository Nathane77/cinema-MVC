<?php ob_start();
?>
      <?php 
        foreach($requete->fetchAll() as $actor) { ?>
            <div class="actor">
                    <img class="actorImg" src="public\img\posters\actorPosters\<?= $actor["person_lastName"]?>.jpeg" alt="">
                <p><?= $actor["person_name"]?> <?= $actor["person_lastName"]?></p>
            </div>
        <?php } ?>

<h2>Liste des films</h2>


<div class="cardContainer">
        <?php
                foreach($actorFilmsDetails->fetchAll() as $filmDetails) { ?>
            <div class="card" onclick="window.location='index.php?action=filmDetails&id=<?=$filmDetails['id_film']?>'"> 
                <div class="cardText">
                    <p><?= $filmDetails["film_title"]?></p>
                    <p>-</p>
                    <p><?= $filmDetails["film_date"]?></p>
                </div>
                <img class="cardPoster" src="public\img\posters\filmPosters\<?=$filmDetails['film_poster']?>" alt='poster of <?=$filmDetails['film_title']?>' >
            </div> 
        <?php } ?>   
    </div>

<?php

$titre = "Détails de l'acteur";
$titre_secondaire = "Détails de l'acteur";
$contenu = ob_get_clean();
require "view/template.php";