<?php 
    $meta_title = 'Accueil | ' . SITE_NAME;
    $meta_desc  = 'Notre page d\'accueil';
    $canonical  = '';
?>

<div class="jumbotron mt-4">
    <h1 class="display-4">Accueil</h1>
    <p class="lead"><?= $res['jumbotron_head'] ?></p>
    <hr class="my-4">
    <p><?= $res['jumbotron_body'] ?></p>
    <a class="btn btn-primary btn-lg" href="/contact" role="button">Contact</a>
</div>