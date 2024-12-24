<?php ob_start();
?>


<h2>
 <?php   
foreach($requete->fetchAll() as $genreDetail) {?>
        <?= $genreDetail["genre_name"]?>
<?php } ?>
</h2>



<table>
    <thead>    
        <tr>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($categoryDetails->fetchAll() as $genreDetail) { ?>
            <tr>
                <td><a href="index.php?action=filmDetails&id=<?= $genreDetail["id_film"]?>"><?= $genreDetail["film_title"]?></a></td>
            </tr>
            <?php } ?>
    </tbody>
</table>



<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";
