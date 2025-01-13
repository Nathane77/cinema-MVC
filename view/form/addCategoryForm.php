<?php ob_start();
?>

<!-- Form for adding a person-->
<div class="formContainer">
    <form class="formAddType" action="index.php?action=addCategory" method="post" id="addtype">

        <label for="addtype">Add your own Category !</label><br>

        <input class="categoryInput" type="text" name="addType" id="addType" placeholder="Category Name"><br>
        <input  class="submitAddType" type="submit" name="submit" value="Submit">

    </form>
</div>

<?php
 if (isset($_SESSION["alert"])) {
    echo $_SESSION["alert"];
    unset($_SESSION["alert"]);
}

$titre = "Liste des categories";
$titre_secondaire = "Liste des categories";
$contenu = ob_get_clean();
require "view/template.php";