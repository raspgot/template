<?php

    date_default_timezone_set("Europe/Paris");
    
    define("VIEWS_PATH", "../views/");
    define("REQUEST_URI", $_SERVER['REQUEST_URI']);

    require( "src/Connection.php" );
    require( "src/Text.php" );