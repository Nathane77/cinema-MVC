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
<table>
    <thead>
        <tr>   
            <th>Prenom</th>
            <th>Nom</th>
            <th>genre</th>
            <th>Anniversaire</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($casting->fetchAll() as $actor) { ?>
        <tr>
            <td><a href="index.php?action=actorDetails&id=<?= $actor["id_actor"]?>"><?= $actor["person_name"]?></a></td>
            <td><?= $actor["person_lastName"]?></td>
            <td><?= $actor["person_gender"]?></td>
            <td><?= $actor["person_birthdate"]?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>


<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";