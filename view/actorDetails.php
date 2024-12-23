<?php ob_start(); 

?>

<p class="uk-label uk-label-warning"></p>

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



<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";