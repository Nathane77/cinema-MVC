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
        SELECT *
        FROM person p
        INNER JOIN director d ON d.id_person = p.id_person");

        require "view/listActeurs.php";
    }
    
    public function actorDetails($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT *
        FROM actor a
        INNER JOIN person p ON p.id_person = a.id_person
        where a.id_actor =".$id);

        require "view/actorDetails.php";
    }
}