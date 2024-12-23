<?php ob_start(); 

?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount()?> categories.</p>

<table>
    <thead>
        <tr>
            <th>Nom de la categorie</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($requete->fetchAll() as $category) { ?>
        <tr>
            <td>
                <a href="index.php?action=categoryDetails&id=<?= $category["id_genre"]?>"><?= $category["genre_name"]?>
                <a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>



<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";