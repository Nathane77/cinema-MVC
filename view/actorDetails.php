<?php ob_start();
?>
<table>
    <thead>
        <tr>
            
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($requete->fetchAll() as $actor) { ?>
        <tr>
    
        </tr>
        <?php } ?>
    </tbody>
</table>

<h2></h2>

<table>
    <thead>
        <tr>
     
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($genreDetails->fetchAll() as $genreDetail) { ?>
            <tr>
                <td><?= $genreDetail["id_genre"]?></td>
                <td><?= $genreDetail["genre_name"]." min"?></td>
            </tr>
            <?php } ?>
    </tbody>
</table>



<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";