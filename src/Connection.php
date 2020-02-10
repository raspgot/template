<?php
    class Connection {
        
        /**
         * Returns a PDO instance
         */

        public static function getPDO()
        {
            try {
                return new PDO('mysql:dbname=cms;host=127.0.0.1', 'root', '');
            } catch (PDOException $e) {
                throw new Exception("Erreur: " . $e->getMessage());
                die();
            }
        }

    }
?>
