<?php

namespace Controller;
use Model\Connect;

class CinemaController {
    //list all the films

    public function listFilms() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT *
        FROM film");

        require "view/listFilms.php";
    }

    public function listActeurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT *
        FROM person p
        INNER JOIN actor a ON a.id_person = p.id_person");

        require "view/listActeurs.php";
    }

    public function filmDetails($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT *
        FROM film f
        where f.id_film =".$id);


        $casting = $pdo->prepare("
        SELECT p.person_name, p.person_lastName, p.person_gender, p.person_birthdate
        FROM person p
        INNER	JOIN actor a ON a.id_person = p.id_person
        INNER JOIN casting c ON c.id_actor = a.id_actor
        INNER JOIN film f ON f.id_film = c.id_film
        WHERE f.id_film =  :id
        ");

        $casting->execute(["id"=>$id]);

        require "view/filmDetails.php";
    }

    public function listCategories() {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT g.genre_name, g.id_genre
        FROM genre g
        ");
        
        require "view/listCategories.php";

    }

    public function actorDetails($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT genre_name, id_genre
        FROM genre g
        where g.id_genre = :id");

        $requete = (["id"=>$id])

    }

}
