<?php
    include '../config.php';

    function returnRes()
    {
        $res[] = Text::getByLink((string)REQUEST_URI);
        echo"<pre>"; print_r($res); echo"</pre>";
    }

    ob_start();

    switch (REQUEST_URI) {
        case '/':
            returnRes();
            require VIEWS_PATH . 'pages/home.php';
            break;

        case '/contact':
            returnRes();
            require VIEWS_PATH . 'pages/contact.php';
            break;

        case '/photos':
            returnRes();
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