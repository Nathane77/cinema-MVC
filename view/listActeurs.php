<?php ob_start(); 

?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount()?> acteur.</p>

<table>
    <thead>
        <tr>
            <th>Prenom</th>
            <th>Nom de famille</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($requete->fetchAll() as $actor) { ?>
        <tr>
            <td><a href="index.php?action=actorDetails&id=<?= $actor["id_actor"]?>"><?= $actor["person_name"]?></a></td>
            <td><?= $actor["person_lastName"]?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";