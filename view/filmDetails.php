<?php ob_start(); 

?>

<p class="uk-label uk-label-warning"></p>

<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Durée en Minute</th>
            <th>Rating</th>
            <th>Année de sortie</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($requete->fetchAll() as $film) { ?>
        <tr>
            <td><?= $film["film_title"]?></td>
            <td><?= $film["film_duration"]." min"?></td>
            <td><?= $film["film_rating"]?></td>
            <td><?= $film["film_date"]?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<h2>Casting</h2>

<div class="castingContainer">
    <h3>Acteurs du film</h3>
        <?php 
        foreach($casting->fetchAll() as $actor) { ?>
            <div class="actor">
                    <img class="actorImg" src="public\img\posters\actorPosters\<?= $actor["person_name"]?>.jpeg" alt="">
                <a href="index.php?action=actorDetails&id=<?= $actor["id_actor"]?>"><?= $actor["person_lastName"]?> <?= $actor["person_name"]?></a>
            </div>
        <?php } ?>
        <h3>Directeur du film</h3>
            <div>
            <?php 
            foreach($director->fetchAll() as $director) { ?>
                <div class="director">
                    <img class="directorImg" src="public\img\posters\directorPosters\<?= $director["person_name"]?>.jpeg" alt="">
                <a href="index.php?action=directorDetails&id=<?= $director["id_director"]?>"><?= $director["person_lastName"]?> <?= $director["person_name"]?></a>
            </div>
            </div>
        <?php } ?>
</div>


<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";