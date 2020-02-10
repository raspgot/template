<?php 
    $meta_title = 'Contact | ' . SITE_NAME;
    $meta_desc  = 'Notre page de contact';
    $canonical  = 'contact';
    
    dump($res);

    /*if(isset($_POST)) {
        $resForm = new Form();
        dump($resForm);
    }*/
?>

<div class="jumbotron mt-4">
    <h1 class="display-4">Contact</h1>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to
        featured content or information.</p>
</div>

<div class="row">
    <div class="col-md-4">
        <ul>
            <li>Adresse</li>
            <li>Téléphone</li>
            <li>Email</li>
        </ul>
    </div>
    <div class="col-md-8">
        <form action="">
            <!-- Statut -->
            <div class="alert p-0" id="status" role="alert"></div>
            <!-- Form -->
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <textarea name="message" class="form-control" rows="6" placeholder="Your message" aria-required="true"
                    required></textarea>
            </div>
            <button type="submit" id="submit-btn" class="btn btn-primary btn-lg w-100">SEND</span></button>
            <!-- Token value | recaptcha -->
            <input name="recaptcha-token" type="hidden">
        </form>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js?render=6Lcll9UUAAAAAMu_zAeRu-rKMILBAU16TwDSUSW0"></script>