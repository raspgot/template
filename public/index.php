<?php
    include '../config.php';

    ob_start();

    switch (REQUEST_URI) {
        case '/':
            $res = Text::getByLink((string)REQUEST_URI);
            require VIEWS_PATH . 'pages/home.php';
            break;

        case '/contact':
            $res = Text::getByLink((string)REQUEST_URI);
            require VIEWS_PATH . 'pages/contact.php';
            break;

        case '/photos':
            $res = Text::getByLink((string)REQUEST_URI);
            require VIEWS_PATH . 'pages/photos.php';
            break;

        default:
            require VIEWS_PATH . '404.php';
            http_response_code(404);
            break;
    }

    $pageContent = ob_get_clean();
    require VIEWS_PATH . 'layout.php';
?>