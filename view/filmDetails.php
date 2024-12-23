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



<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";