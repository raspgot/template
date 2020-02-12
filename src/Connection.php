<?php
    namespace App;
    
    use PDO;
    use Exception;
    use PDOException;

    class Connection {
        
        /**
         * Returns a PDO instance
         */

        public static function getPDO(): PDO 
        {
            try {
                return new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            } catch (PDOException $e) {
                throw new Exception("Erreur: " . $e->getMessage());
                die();
            }
        }

    }
?>
