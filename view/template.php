<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public\style\style.css">
    <title><?= $titre ?></title>
</head>
    <body>
        <nav>
            <div class="navLinks">
                <a href="index.php?action=mainMenu">Main menu</a>
                <a href="index.php?action=listFilms">Films</a>
                <a href="index.php?action=listActeurs">Actors</a>
                <a href="index.php?action=listDirectors">Director</a>
                <a href="index.php?action=listCategories">Category</a>
                <a href="index.php?action=listCategories">Quotes</a>
            </div>
            <input class="navSearchBar" type="text" placeholder="Search..">
        </nav>
        <main>
            <div class="content">
                <h1>PDO Cinema</h1>
                <h2><?php $titre_secondaire?></h2>
                <?= $contenu ?>
            </div>
        </main>
        <footer>
        </footer>
        <script src="public\js\checkboxes.js"></script>
    </body>
</html>