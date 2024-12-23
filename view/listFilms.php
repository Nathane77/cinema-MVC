<?php ob_start(); 

?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount()?> films.</p>

<table>
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNE SORTIE</th>
            <th>DETAILS</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($requete->fetchAll() as $film) { ?>
        <tr>
            <td><?= $film["film_title"]?> </td>
            <td><?= $film["film_date"]?></td>
            <td><a href="index.php?action=filmDetails&id=<?= $film["id_film"]?>"> Voir plus.</a></td>
            
        </tr>
        <?php } ?>
    </tbody>
</table>



<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";