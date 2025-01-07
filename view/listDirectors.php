<?php ob_start(); 

?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount()?> directeur.</p>

<div class="directorContainer">
        <?php 
        foreach($requete->fetchAll() as $director) { ?>
            <div class="director">
                    <img class="directorImg" src="public\img\posters\directorPosters\<?= $director["person_lastName"]?>.jpeg" alt="">
                <a href="index.php?action=actorDetails&id=<?= $director["id_director"]?>"><?= $director["person_name"]?> <?= $director["person_lastName"]?></a>
            </div>
        <?php } ?>
</div>

<?php

$titre = "Liste des realisateur";
$titre_secondaire = "Liste des realisateur";
$contenu = ob_get_clean();
require "view/template.php";