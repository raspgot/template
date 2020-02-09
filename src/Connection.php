<?php
    class Connection {

        public static function getPDO()
        {
            return new PDO('mysql:dbname=cms;host=127.0.0.1', 'root', '');
        }

    }
?>
