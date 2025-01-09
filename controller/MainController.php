<?php

namespace Controller;

class MainController {
    public function mainMenu(){
        require "view/mainMenu.php";
    }

    public function redirect(){
        header("location: index.php?action=mainMenu");
        die();
    }
}