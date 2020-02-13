<?php

    require '../vendor/autoload.php';
    require '../config.php';

    use App\Text;
    use App\Router;
    use App\Form;

    if (ENV === 'dev') {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }
    
    ob_start();

    Router::add('/', function() {
        $res = Text::getByLink('/');
        require VIEWS_PATH . 'pages/home.php';
    });
    
    Router::add('/contact', function() {
        $res = Text::getByLink('/contact');
        require VIEWS_PATH . 'pages/contact.php';
    });

    // Post route example
    Router::add('/contact-form', function() {
        new Form($_POST);
    }, 'post');

    Router::add('/photos', function() {
        $res = Text::getByLink('/photos');
        require VIEWS_PATH . 'pages/photos.php';
    });

    Router::add('/admin', function() {
        $res = new Text();
        require VIEWS_PATH . 'pages/admin.php';
    });

    Router::pathNotFound(function($path) {
        require VIEWS_PATH . '404.php';
        http_response_code(404);
    });
    
    Router::methodNotAllowed(function($path, $method) {
        require VIEWS_PATH . '405.php';
        http_response_code(405);
    });
    
    Router::run('/');
    
    $pageContent = ob_get_clean();
    require VIEWS_PATH . 'layout.php';
?>