<?php
    namespace App;
    
    use PDO;
    use Exception;
    use PDOException;

    class Connection {
        
        /**
         * Returns a PDO instance with proper error handling
         * 
         * @return PDO
         * @throws Exception
         */
        public static function getPDO(): PDO 
        {
            try {
                $pdo = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $pdo;
            } catch (PDOException $e) {
                error_log("Database connection error: " . $e->getMessage());
                throw new Exception("Database connection failed. Please check your configuration.");
            }
        }

    }
?>
