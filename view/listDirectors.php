<?php ob_start(); 

?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount()?> directeur.</p>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Nom de famille</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($requete->fetchAll() as $director) { ?>
        <tr>
            <td><a href="index.php?action=directorDetails&id=<?= $director["id_director"]?>"><?= $director["person_name"]?></a></td>
            
            <td><?= $director["person_lastName"]?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>



<?php

$titre = "Liste des realisateur";
$titre_secondaire = "Liste des realisateur";
$contenu = ob_get_clean();
require "view/template.php";