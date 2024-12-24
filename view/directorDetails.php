<?php ob_start();
?>
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
        foreach($requete->fetchAll() as $actor) { ?>
        <tr>
            <td><?= $actor["person_name"]?></td>
            <td><?= $actor["person_lastName"]?></td>
            <td><?= $actor["person_gender"]?></td>
            <td><?= $actor["person_birthdate"]?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<h2>Liste des films</h2>

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
        foreach($directorFilmsDetails->fetchAll() as $filmDetails) { ?>
            <tr>
                <td><a href="index.php?action=filmDetails&id=<?= $filmDetails["id_film"]?>"><?= $filmDetails["film_title"]?></a></td>
                <td><?= $filmDetails["film_duration"]." min"?></td>
                <td><?= $filmDetails["film_rating"]?></td>
                <td><?= $filmDetails["film_date"]?></td>
            </tr>
            <?php } ?>
    </tbody>
</table>



<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";