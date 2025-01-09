<?php ob_start();
?>

<div class="formContainer">
        <form class="formAddType" action="index.php?action=addCasting" method="post" id="addtype">

            <label for="addtype">Add your own Casting !</label><br>

            <input class="categoryInput" type="text" name="addName" id="addName" placeholder="Person's name"><br>
            <input class="categoryInput" type="text" name="addLastName" id="addLastName" placeholder="Person's lastname"><br>
            <input class="categoryInput" type="text" name="addGender" id="addGender" placeholder="Person's gender"><br>
            <input class="categoryInput" type="text" name="addBirthdate" id="addBirthdate" placeholder="Person's birthdate"><br>

            <div class="RadioInputContainer">
                <label for="actor">Actor</label>
                <input class="radioInput" type="radio" name="castingActor" id="actor" >
                <label for="director">Director</label>
                <input type="radio" name="castingDirector" id="director">
            </div>
            <input  class="submitAddType" type="submit" name="submit" value="Submit">

        </form>

    </div>

    <?php
$titre = "Liste des categories";
$titre_secondaire = "Liste des categories";
$contenu = ob_get_clean();
require "view/template.php";