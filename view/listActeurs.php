<?php ob_start(); 

?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount()?> acteur.</p>

<div class="actorContainer">
        <?php 
        foreach($requete->fetchAll() as $actor) { ?>
            <div class="actor">
                    <img class="actorImg" src="public\img\posters\actorPosters\<?= $actor["person_name"]?>.jpeg" alt="">
                <a href="index.php?action=actorDetails&id=<?= $actor["id_actor"]?>"><?= $actor["person_lastName"]?> <?= $actor["person_name"]?></a>
            </div>
        <?php } ?>
</div>

<?php
$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";