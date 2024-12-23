<?php

namespace Controller;
use Model\Connect;

class PersonController {
public function listActeurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT *
        FROM person p
        INNER JOIN actor a ON a.id_person = p.id_person");

        require "view/listActeurs.php";
    }

    public function listDirectors() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT p.person_name, p.person_lastName, p.person_gender, p.person_birthdate, d.id_director
        FROM director d
        INNER JOIN person p ON p.id_person = d.id_person
        ");

        require "view/listDirectors.php";
    }
    
    public function actorDetails($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT p.person_name, p.person_lastName, p.person_gender, p.person_birthdate
        FROM actor a
        INNER JOIN person p ON p.id_person = a.id_person
        where a.id_actor = :id");

        $requete->execute(["id"=>$id]);

        $actorFilmsDetails=$pdo->prepare("
        SELECT f.film_title, f.film_duration, f.film_rating, f.film_date
        FROM actor a
        INNER JOIN person p ON p.id_person = a.id_person
        INNER JOIN casting c ON c.id_actor = a.id_actor
        INNER JOIN film f ON f.id_film = c.id_film
        where a.id_actor = :id");

        $actorFilmsDetails->execute(["id"=>$id]);

        require "view/actorDetails.php";
    }
}