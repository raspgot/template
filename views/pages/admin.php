<?php 
    $meta_title = 'Administration | ' . SITE_NAME;
    $meta_desc  = 'Administration du site';
    $canonical  = 'administration';
?>
<!--
<div class="nav-scroller bg-white shadow-sm pt-nav">
    <nav class="nav nav-underline">
        <a class="nav-link active" href="/admin">
            Accueil
            <span class="badge badge-pill bg-light align-text-bottom">17</span>
        </a>
        <a class="nav-link" href="/admin/photos">
            Photos
            <span class="badge badge-pill bg-light align-text-bottom">21</span>
        </a>
        <a class="nav-link" href="/admin/contact">
            Contact
            <span class="badge badge-pill bg-light align-text-bottom">6</span>
        </a>
    </nav>
</div>
-->

<ul class="nav nav-tabs mb-3 pt-nav" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
            Accueil
            <span class="badge badge-pill bg-light text-primary align-text-bottom">17</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
            Photos
            <span class="badge badge-pill bg-light text-primary align-text-bottom">21</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
            Contact
            <span class="badge badge-pill bg-light text-primary align-text-bottom">4</span>
        </a>
    </li>
</ul>

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">Accueil <?php dump($res['/']); ?></div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">Photos <?php dump($res['/photos']); ?></div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">Contact <?php dump($res['/contact']); ?></div>
</div>