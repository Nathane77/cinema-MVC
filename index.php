<?php 
use Controller\CinemaController;
use Controller\PersonController;

spl_autoload_register(function($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();
$ctrlPerson= new PersonController();

if(isset($_GET["action"])){
    switch($_GET["action"]){
        case "listFilms": $ctrlCinema->listFilms(); break;
        case "listActeurs": $ctrlPerson->listActeurs(); break;
        case "listDirectors": $ctrlPerson->listDirectors(); break;
        case "filmDetails": $ctrlCinema->filmDetails($_GET["id"]); break;
        case "actorDetails": $ctrlPerson->actorDetails($_GET["id"]); break;
    }
}