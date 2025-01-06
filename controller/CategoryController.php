<?php

namespace Controller;
use Model\Connect;

class CategoryController {

    public function listCategories() {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT g.genre_name, g.id_genre
        FROM genre g
        ");
        
        require "view/listCategories.php";

    }

    public function categoryDetails($id) {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT g.genre_name
        FROM genre g
        WHERE g.id_genre = :id
        ");
        
        $requete->execute(["id"=>$id]);


        $categoryDetails = $pdo->prepare("
        SELECT f.film_title, f.id_film ,g.genre_name
        FROM genre g
        INNER JOIN film f ON f.film_genre = g.id_genre
        WHERE g.id_genre = :id
        ");

        $categoryDetails->execute(["id"=>$id]);

        require "view/categoryDetails.php";

    }

    public function addCategoryForm(){

        
        require "view/addCategoryForm.php";
    }

    public function addCategory() {

        if(isset($_POST['submit'])){

            $addCategory = filter_input(INPUT_POST, "addType", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

           

            if($addCategory){
                $pdo = Connect::seConnecter();
                $requete = $pdo->prepare("
                INSERT INTO genre (genre_name) 
                values
                (:newGenre)
                ");
                
                $requete->execute(["newGenre"=>$addCategory]);  
            }
        }

        else{
            $addCategory = null;
            echo "Something went wrong, try again.";
        }

        header("location: index.php?action=listCategories");
    }
}