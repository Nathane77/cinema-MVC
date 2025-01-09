<?php 
use Controller\CinemaController;
use Controller\PersonController;
use Controller\MainController;
use Controller\CategoryController;

spl_autoload_register(function($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();
$ctrlPerson= new PersonController();
$ctrlMain= new MainController();
$ctrlCategory = new CategoryController();

if(isset($_GET["action"])){
    switch($_GET["action"]){
        // case "": $ctrlMain->mainMenu();
        case "mainMenu": $ctrlMain->mainMenu(); break;

        case "listFilms": $ctrlCinema->listFilms(); break;
        case "filmDetails": $ctrlCinema->filmDetails($_GET["id"]); break;

        case "listActeurs": $ctrlPerson->listActeurs(); break;
        case "actorDetails": $ctrlPerson->actorDetails($_GET["id"]); break;

        case "listDirectors": $ctrlPerson->listDirectors(); break;
        case "directorDetails": $ctrlPerson->directorDetails($_GET["id"]); break;
        
        case "listCategories": $ctrlCategory->listCategories(); break;
        case "categoryDetails": $ctrlCategory->categoryDetails($_GET["id"]); break;
        
        case "addCategoryForm": $ctrlCategory->addCategoryForm(); break;
        case "addFilmForm": $ctrlCinema->addFilmForm(); break;
        case "addCastingForm": $ctrlPerson->addCastingForm(); break;

        case "addCategory": $ctrlCategory->addCategory(); break;
        case "addCasting": $ctrlPerson->addCasting(); break;
    }
}else{
   $ctrlMain->redirect();
}

