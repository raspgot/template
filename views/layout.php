<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$meta_title ?? ''?></title>
    <meta name="description" content="<?=$meta_desc?? ''?>">
    <!--<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top 
        <?= (REQUEST_URI === "/admin" ? 'navbar-dark bg-dark' : 'navbar-light bg-light'); ?>">
        <a class="navbar-brand mr-auto mr-lg-0" href="/"><?= SITE_NAME ?></a>
        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/photos">Photos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="container mb-4">
        <?=$pageContent?>
    </main>

    <footer class="bg-light">
        <div class="container">
            <a href="/admin">Administration</a>
            <?php if (ENV === 'dev') { ?>
                - <?= round(1000 * (microtime(true) - DEBUG_TIME)) ?> ms
            <?php } ?>
        </div>
    </footer>

    <script src="assets/js//jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>