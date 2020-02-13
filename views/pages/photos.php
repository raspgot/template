<?php 
    $meta_title = 'Photos | ' . SITE_NAME;
    $meta_desc  = 'Notre galerie photos';
    $canonical  = 'photos';
?>

<div class="jumbotron">
    <h1 class="display-4">Photos</h1>
    <p class="lead"><?= $res['jumbotron'] ?></p>
</div>

<div class="row text-center">
    <div class="col-4">
        <a data-fancybox="gallery" href="https://picsum.photos/200/300">
            <img src="https://picsum.photos/200/300" class="rounded shadow img-fluid">
        </a>
    </div>
    <div class="col-4">
        <a data-fancybox="gallery" href="https://picsum.photos/200/300">
            <img src="https://picsum.photos/200/300" class="rounded shadow img-fluid">
        </a>
    </div>
    <div class="col-4">
        <a data-fancybox="gallery" href="https://picsum.photos/200/300">
            <img src="https://picsum.photos/200/300" class="rounded shadow img-fluid">
        </a>
    </div>
</div>