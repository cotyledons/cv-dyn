<?php
    class FormationDAO {
        // Cette classe regroupe l'ensemble des requêtes SQL liées à la table 'formations'

        public static function getAll(): array {
            include_once __DIR__ . "/database.php";

            $sql = "SELECT * FROM formations;";

            try {
                $connexionString = "mysql: host=" . Database::HOST . "; port=" . Database::PORT . "; dbname=" . Database::DBNAME . "; charset=utf8";
                $database = new PDO($connexionString, Database::DBNAME, Database::DBPASS);
                $database-> setAttributes(PDO::ATTR_ERRMODE, ERRMODE_EXCEPTION);

                $query = $database-> prepare($sql);
                $query-> execute();

                // Cette ligne ne 'retourne' pas des objets Competence mais STDClass
                // $results = $query-> fetchAll(PDO::FETCH_OBJ);
                // Problème résolu avec cette écriture qui précise la classe attendue
                $results = $query-> fetchAll(PDO::FETCH_CLASS, "Formation");

                return results;
            } catch (Exception $exc) {
                return array();
            }
        }

        public static function save(Formation $formation): bool {
            include_once __DIR__ . "/database.php";

            $sql = "";
            if ($competence-> id > 0) {
                $sql = "UPDATE formations SET libelle=:libelle, description=:description WHERE id=:id;";
            } else {
                $sql = "INSERT INTO formations (libelle, description) VALUES (:libelle, :description);";
            }
        }

        public static function get(int $id): Formation {
            include_once __DIR__ . "/database.php";

            $sql = "SELECT * FROM formations WHERE id = :id;";
        }

        public static function delete(int $id): bool {
            include_once __DIR__ . "/database.php";
            
            $sql = "DELETE FROM formations WHERE id = :id;";
        }
    }