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
            SELECT f.film_title, f.film_duration, f.id_film, f.film_rating, f.film_date, f.film_poster,p.person_name, d.id_person
            FROM director d
            INNER JOIN person p ON d.id_person = p.id_person
            INNER JOIN film f ON f.id_director = d.id_director
            WHERE d.id_director = :id");
    
            $directorFilmsDetails->execute(["id"=>$id]);
    
            require "view/directorDetails.php";
        
    }

    public function addCastingForm() {

        require "view/form/addCastingForm.php";
    }

    public function addCasting() {
    
          if(isset($_POST['submit'])){

            $addName = filter_input(INPUT_POST, "addName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $addLastName = filter_input(INPUT_POST, "addLastName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $addGender = filter_input(INPUT_POST, "addGender", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $addBirthdate = filter_input(INPUT_POST, "addBirthdate", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $castingActor = filter_input(INPUT_POST, "castingActor");
            $castingDirector = filter_input(INPUT_POST, "castingDirector");


          
            if($addName && $addLastName && $addGender && $addBirthdate){
                var_dump($_POST);
                die;
                if($castingActor == "on"){
                    $pdo = Connect::seConnecter();
                    $requete = $pdo->prepare("

                    INSERT INTO person (person_name, person_lastName, person_gender, person_poster, person_birthdate)
                    VALUES (:name, :lastName, :gender, :poster, :birthdate)

                    SET @new_person_id = LAST_INSERT_ID();

                    INSERT INTO actor a ('id_person')
                    

                    ");

                    $requete->execute(
                        ["name"=>$addName,
                        "lastName"=>$addLastName,
                        "poster"=>$addLastName.".jpg",
                        "gender"=>$addGender,
                        "birthdate"=>$addBirthdate]);
                }
               
                elseif($castingDirector == "on"){
                    $pdo = Connect::seConnecter();
                    $requete = $pdo->prepare("

                    INSERT INTO person (person_name, person_lastName, person_gender, person_poster, person_birthdate)
                    VALUES (:name, :lastName, :gender, :poster, :birthdate)

                    SET @new_person_id = LAST_INSERT_ID();

                    INSERT INTO director  ('id_person')
                    
                    ");

                    $requete->execute(
                        ["name"=>$addName,
                        "lastName"=>$addLastName,
                        "poster"=>$addLastName.".jpg",
                        "gender"=>$addGender,
                        "birthdate"=>$addBirthdate]);
                }
                else{
                    header('location: index.php');
                    die;
                }
            }
        header("location: index.php?action=listFilms");
        die;
        }
    }
}