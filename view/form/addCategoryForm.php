<?php ob_start();

// if(isset($_POST['submit'])){
//     $newGenre_name = filter_input(INPUT_POST, "addType", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//     if(!$newGenre_name){
//         $newGenre_name = null;
//         echo "Something went wrong, try again.";
//     }
// }

?>


<div class="formContainer">
        <form class="formAddType" action="index.php?action=addCategory" method="post" id="addtype">

            <label for="addtype">Add your own Category !</label><br>

            <input class="categoryInput" type="text" name="addType" id="addType" placeholder="Category Name"><br>

            <input  class="submitAddType" type="submit" name="submit" value="Submit">

        </form>

    </div>

<?php
$titre = "Liste des categories";
$titre_secondaire = "Liste des categories";
$contenu = ob_get_clean();
require "view/template.php";