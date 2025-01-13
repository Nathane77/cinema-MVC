<?php

//importers the objects form the controller namespace
use Controller\CinemaController;
use Controller\PersonController;
use Controller\MainController;
use Controller\CategoryController;


//autoload classes when called
spl_autoload_register(function($class_name) {
    include $class_name . '.php';
});


//creates the object to get access to their respective functions
$ctrlCinema = new CinemaController();
$ctrlPerson= new PersonController();
$ctrlMain= new MainController();
$ctrlCategory = new CategoryController();


//case switch for the "action" in the link
if(isset($_GET["action"])){
    switch($_GET["action"]){
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

