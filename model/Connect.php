<?php
 
namespace Model;
//The class is abstract because we never call the classe Connect-> only the method seConnecter()
abstract class Connect {

    //give the parameters to connect to the DB
    const HOST = "localhost";
    const DB = "allocinenassim";
    const USER = "root";
    const PASS ="";
 
    //creates the connect function with PDO
    public static function seConnecter() {
        try {
            $pdo = new \PDO(
                "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8", 
                self::USER, 
                self::PASS,
                array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION)
            );
            return $pdo;
        } catch (\PDOException $ex) {
            // Enregistrer l'erreur dans un fichier de log
            error_log("Erreur de connexion à la base de données: " . $ex->getMessage());
            return "Erreur de connexion à la base de données.";
        }
    }
}