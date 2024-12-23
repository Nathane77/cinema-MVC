<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view\style.css">
    <title><?= $titre ?></title>
</head>
    <body>
        <nav>
            <div class="navLinks">
                <a>Main menu</a>
                <a>Films</a>
                <a>Actors</a>
                <a>Director</a>
            </div>
            <input class="navSearchBar" type="text" placeholder="Search..">
        </nav>
        <main>
            <div>
                <h1>PDO Cinema</h1>
                <h2><?php $titre_secondaire?></h2>
                <?= $contenu ?>
            </div>
        </main>
    </body>
</html>