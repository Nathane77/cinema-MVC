<?php ob_start();
?>
      <?php 
        foreach($requete->fetchAll() as $director) { ?>
            <div class="director">
                    <img class="directorImg" src="public\img\posters\directorPosters\<?= $director["person_lastName"]?>.jpeg" alt="">
                <p><?= $director["person_name"]?> <?= $director["person_lastName"]?></p>
            </div>
        <?php } ?>

<h2>Liste des films</h2>


<div class="cardContainer">
        <?php
        foreach($directorFilmsDetails->fetchAll() as $filmDetails) { ?>
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

$titre = "Détails du realisateur";
$titre_secondaire = "Détails du realisateur";
$contenu = ob_get_clean();
require "view/template.php";