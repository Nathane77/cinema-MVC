<?php
namespace Controller;
//imports the connect model to use the database.
use Model\Connect;

session_start();

//create a class with function used in the index page.
class CategoryController {


    //creates the function.
    public function listCategories() {

        //connects to the DB.
        $pdo = Connect::seConnecter();

        //makes a query based on what is needed in the view.
        $requete = $pdo->query("
        SELECT g.genre_name, g.id_genre, f.film_poster, f.film_title
        FROM genre g
        INNER JOIN film f ON f.film_genre = g.id_genre;

        
        ");

        //calls the view.
        require "view/listCategories.php";

    }

    public function categoryDetails($id) {

        $pdo = Connect::seConnecter();

        //prepares a query with changeable parameters.
        $requete = $pdo->prepare("
        SELECT g.genre_name
        FROM genre g
        WHERE g.id_genre = :id
        ");
        
        //executes the query and changes the selected parameters.
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


    //changes pages
    public function addCategoryForm(){
        require "view/form/addCategoryForm.php";
    }


    public function addCategory() {

        //verify if the form was posted
        if(isset($_POST['submit'])){

            //filters the input of the form and saves it in a variable, if it fails to pass the filters, the variable is not created.
            $addCategory = filter_input(INPUT_POST, "addType", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_EMPTY_STRING_NULL);

            //if the variable existe.
            if($addCategory){

                //prepare this query.
                $pdo = Connect::seConnecter();
                $requete = $pdo->prepare("
                INSERT INTO genre (genre_name) 
                values
                (:newGenre)
                ");
                
                //execute this query and change the parameters.
                $requete->execute(["newGenre"=>$addCategory]);  
            }
            else{
                $_SESSION["alert"] = "<div class='divAlert'><p>Something went wrong, try again.</p></div>";
            header("location: index.php?action=addCategoryForm");
            die;
            }
            
        }
        else{
            //empties the variable, and show an error message.
        }
        //redirects you to the list of categories page.
        header("location: index.php?action=listCategories");
        die;
    }
}