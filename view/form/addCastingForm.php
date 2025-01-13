<?php ob_start();
session_start();
?>

<!-- Form for adding a person-->
<div class="formContainer">
        <form class="formAddType" action="index.php?action=addCasting" method="post" id="addtype">

            <label for="addtype">Add your own Casting !</label><br>

            <!-- autocomplete="off" -->
            <input class="categoryInput" type="text" name="addName" id="addName" placeholder="Person's name" ><br>
            <input class="categoryInput" type="text" name="addLastName" id="addLastName" placeholder="Person's lastname"><br>
            <input class="categoryInput" type="text" name="addGender" id="addGender" placeholder="Person's gender"><br>
            <input class="categoryInput" type="text" name="addBirthdate" id="addBirthdate" placeholder="Person's birthdate"><br>

            <!-- radio input to choose between making the person an actor or a director-->
            <div class="RadioInputContainer">
                <label for="actor">Actor</label>
                <input class="checkboxInput" type="checkbox" name="castingActor" value="actor" click='RequireCheckbox("checkboxInput")'>
                <label for="director">Director</label>
                <input class="checkboxInput" type="checkbox" name="castingDirector" value="director" onclick='RequireCheckbox("checkboxInput")'>
            </div>
            <input  class="submitAddType" type="submit" name="submit" value="Submit">

        </form>

    </div>

    <?php
$titre = "Liste des categories";
$titre_secondaire = "Liste des categories";
$contenu = ob_get_clean();
require "view/template.php";