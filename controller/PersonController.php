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

    public function actorDetails($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT p.person_name, p.person_lastName, p.person_gender, p.person_birthdate
        FROM actor a
        INNER JOIN person p ON p.id_person = a.id_person
        where a.id_actor = :id");

        $requete->execute(["id"=>$id]);

        $actorFilmsDetails=$pdo->prepare("
        SELECT f.film_title, f.film_duration, f.film_rating, f.film_date, f.film_poster, f.id_film
        FROM actor a
        INNER JOIN person p ON p.id_person = a.id_person
        INNER JOIN casting c ON c.id_actor = a.id_actor
        INNER JOIN film f ON f.id_film = c.id_film
        where a.id_actor = :id");

        $actorFilmsDetails->execute(["id"=>$id]);

        require "view/actorDetails.php";
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
    
    public function directorDetails($id) {
       
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("
            SELECT p.person_name, p.person_lastName, p.person_gender, p.person_birthdate
            FROM director d
            INNER JOIN person p ON p.id_person = d.id_person
            WHERE d.id_director = :id");
    
            $requete->execute(["id"=>$id]);
    
            $directorFilmsDetails=$pdo->prepare("
            SELECT f.film_title, f.film_duration, f.id_film, f.film_rating, f.film_date, p.person_name, d.id_person
            FROM director d
            INNER JOIN person p ON d.id_person = p.id_person
            INNER JOIN film f ON f.id_director = d.id_director
            WHERE d.id_director = :id");
    
            $directorFilmsDetails->execute(["id"=>$id]);
    
            require "view/directorDetails.php";
        
    }
  
}