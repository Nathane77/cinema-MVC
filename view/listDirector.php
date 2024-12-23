<?php ob_start(); 

?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount()?> directeur.</p>

<table>
    <thead>
        <tr>
            <th>Acteurs</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($requete->fetchAll() as $actor) { ?>
        <tr>
            <td><?= $actor["person_name"]?></td>
            <td><?= $actor["person_lastName"]?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>



<?php

$titre = "Liste des realisateur";
$titre_secondaire = "Liste des realisateur";
$contenu = ob_get_clean();
require "view/template.php";