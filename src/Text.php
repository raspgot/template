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
                while ($row = $sth->fetch()) {
                    $data[$row['title']] = $row['content'];
                }
                $pdo = null;
                return $data;
            }
            catch (PDOException $e) {
                print $e->getMessage();
            }
        }

    }
?>
