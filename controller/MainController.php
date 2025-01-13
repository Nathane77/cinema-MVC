<?php

namespace Controller;

//create a class with function used in the index page.
class MainController {

    //creates the function.
    public function mainMenu(){

        //makes a query based on what is needed in the view.
        require "view/mainMenu.php";
    }

    public function redirect(){
        
        //makes a query based on what is needed in the view.
        header("location: index.php?action=mainMenu");
        die();
    }
}