<?php

    date_default_timezone_set("Europe/Paris");
    
    define("SITE_NAME", "Peintre");
    define("VIEWS_PATH", "../views/");
    
    if ($_SERVER['SERVER_NAME'] === 'localhost') define("ENV", 'dev');
    else define("ENV", 'prd');