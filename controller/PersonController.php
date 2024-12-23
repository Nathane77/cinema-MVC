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
}