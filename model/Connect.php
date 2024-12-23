<?php
 
namespace Model;
// la classe est abstraite car on n'instanciera jamais la classe Connect -> on a seulement besoin d'accéder à la méthode seConnecter()
abstract class Connect {
    const HOST = "localhost";
    const DB = "allocinenassim";
    const USER = "root";
    const PASS ="";
 
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