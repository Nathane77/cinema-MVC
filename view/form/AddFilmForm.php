<?php ob_start();
?>


<div class="formContainer">
    <p>Vérifier que vous avez le casting mis en place</p>
    <p>avant de demarez l'ajout d'un film.</p>
        <form class="formAddType" action="index.php?action=addCategory" method="post" id="addtype">

            <label for="addtype">Add your own Film!</label><br>

            <input class="categoryInput" type="text" name="addType" id="addType" placeholder="Category Name"><br>

            <input  class="submitAddType" type="submit" name="submit" value="Submit">

        </form>
    </div>

    <button class="addFormButton" onclick="window.location='index.php?action=addCastingForm'">Ajouter votre propre casting!</button>


<?php
$titre = "Liste des categories";
$titre_secondaire = "Liste des categories";
$contenu = ob_get_clean();
require "view/template.php";