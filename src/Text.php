<?php
    namespace App;

    use PDO;
    use PDOException;

    class Text {

        /**
         * Returns the name and the content's <div>
         * 
         * @param string The current link
         */
        public static function getByLink(string $link): array
        {
            $pdo = Connection::getPDO();
            try {
                $sth = $pdo->prepare("SELECT title, content FROM contents WHERE link = :link");
                $sth->bindValue(":link", $link, PDO::PARAM_STR);
                $sth->execute();
                $data = $sth->fetchAll(PDO::FETCH_KEY_PAIR);
                $pdo = null;
                return $data;
            } catch (PDOException $e) {
                error_log("Database error: " . $e->getMessage());
                return [];
            }
        }
        
        /**
         * Updates content
         * 
         * @param string $title The content's title
         * @param string $content The content to update
         */
        public static function updateByLink(string $title, string $content): void
        {
            try {
                $pdo = Connection::getPDO();
                $sth = $pdo->prepare("UPDATE contents SET publishedDate = NOW(), content = :content WHERE title = :title");
                $sth->bindValue(":title", $title, PDO::PARAM_STR);
                $sth->bindValue(":content", $content, PDO::PARAM_STR);
                $sth->execute();
                $pdo = null;
            } catch (PDOException $e) {
                error_log("Database error: " . $e->getMessage());
                throw new \Exception("Failed to update content");
            }
        }

    }
?>
