<?php 
    $meta_title = 'Administration | ' . SITE_NAME;
    $meta_desc  = 'Administration du site';
    $canonical  = 'administration';

    // dd($res->getByLink('/'));
?>

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
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <form action="cms-form" method="post">
            <?php foreach ($res->getByLink('/') as $name => $content) { ?>
                <div class="form-group">
                    <label for="<?= $name ?>"><?= $name ?></label>
                    <textarea class="form-control" id="<?= $name ?>" name="<?= $name ?>" rows="4"><?= htmlspecialchars($content) ?></textarea>
                </div>
            <?php } ?>
            <button type="submit" id="submit-btn" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <form action="cms-form" method="post">
            <?php foreach ($res->getByLink('/photos') as $name => $content) { ?>
                <div class="form-group">
                    <label for="<?= $name ?>"><?= $name ?></label>
                    <textarea class="form-control" id="<?= $name ?>" name="<?= $name ?>" rows="4"><?= htmlspecialchars($content) ?></textarea>
                </div>
            <?php } ?>
            <button type="submit" id="submit-btn" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <form action="cms-form" method="post">
            <?php foreach ($res->getByLink('/contact') as $name => $content) { ?>
                <div class="form-group">
                    <label for="<?= $name ?>"><?= $name ?></label>
                    <textarea class="form-control" id="<?= $name ?>" name="<?= $name ?>" rows="4"><?= htmlspecialchars($content) ?></textarea>
                </div>
            <?php } ?>
            <button type="submit" id="submit-btn" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</div>