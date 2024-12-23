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

        require "view/filmDetails.php";
    }
}

