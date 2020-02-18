<?php
    date_default_timezone_set("Europe/Paris");
    
    define("SITE_NAME", "Peintre");
    define("VIEWS_PATH", "../views/");
    define("REQUEST_URI", $_SERVER['REQUEST_URI']);
    define("DEBUG_TIME", microtime(true));
    define("DB_DSN", "mysql:host=localhost;dbname=cms");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "");
    
    if ($_SERVER['SERVER_NAME'] === 'localhost') define("ENV", 'dev');
    else define("ENV", 'prd');
?>