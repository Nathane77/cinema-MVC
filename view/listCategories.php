<?php ob_start();

// if(isset($_POST['submit'])){
//     $newGenre_name = filter_input(INPUT_POST, "addType", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
// }
// else{
//     $newGenre_name = null;
//     echo "Something went wrong, try again.";
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount()?> categories.</p>

    <div class="cardContainer">
        <?php
            foreach($requete->fetchAll() as $category) { ?>
            <div class="card" onclick="window.location='index.php?action=categoryDetails&id=<?= $category['id_genre']?>'"> 
                <p><?= $category["genre_name"]?></p>
            </div> 
        <?php } ?>   
    </div>

    <div class="formContainer">
        <!-- <form class="formAddType" action="index.php?action=addCategory&addType=<?= $newGenre_name?>" method="post" id="addtype"> -->

            <label for="addtype">Add your own Category !</label><br>

            <input class="categoryInput" type="text" name="addType" id="addType" placeholder="Category Name"><br>

            <input  class="submitAddType" type="submit" name="submit" value="Submit">

        </form>

    </div>
</body>
</html>

<?php
// var_dump($_POST);

$titre = "Liste des categories";
$titre_secondaire = "Liste des categories";
$contenu = ob_get_clean();
require "view/template.php";