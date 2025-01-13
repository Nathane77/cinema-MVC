<?php

namespace Controller;
//imports the connect model to use the database.

use Model\Connect;

//create a class with function used in the index page.
class CinemaController {

    //creates the function.
    public function listFilms() {

        //connects to the DB.
        $pdo = Connect::seConnecter();

        //makes a query based on what is needed in the view.
        $requete = $pdo->query("
        SELECT *
        FROM film");

        //calls the view.
        require "view/listFilms.php";
    }

    public function filmDetails($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT *
        FROM film f
        where f.id_film = :id");

        $requete->execute(["id"=>$id]);

        $casting = $pdo->prepare("
        SELECT p.person_name, p.person_lastName, p.person_gender, p.person_birthdate, a.id_actor
        FROM person p
        INNER JOIN actor a ON a.id_person = p.id_person
        INNER JOIN casting c ON c.id_actor = a.id_actor
        INNER JOIN film f ON f.id_film = c.id_film
        WHERE f.id_film =  :id
        ");

        $casting->execute(["id"=>$id]);


        $director = $pdo->prepare("
          SELECT p.person_name, p.person_lastName, p.person_gender, p.person_birthdate, d.id_director
        FROM person p
        INNER JOIN director d ON d.id_person = p.id_person
        INNER JOIN film f ON f.id_director = d.id_director
        WHERE f.id_film =  :id");

        $director->execute(["id"=>$id]);

        require "view/filmDetails.php";
    }

    public function listActeurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT *
        FROM person p
        INNER JOIN actor a ON a.id_person = p.id_person");

        require "view/listActeurs.php";
    }

    public function addFilmForm(){

        require "view/form/AddFilmForm.php";

    }
}
