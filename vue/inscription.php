<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-xxl-5 col-auto">
            <div class="card mt-4 border border-5 reveal-1" style="background-color: #556B2F; border-color: #7FFFD4!important;">
                <div class="card-header" style="background-color: #556B2F;">
                    <h3 class="text-center text-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                    </h3>
                    <p class="text-center text-light fw-bold fs-3">Créer un compte</p>
                </div>
                <div class="card-body" style="border-radius: .25rem!important; background-color: #556B2F;">
                    <form method="post" action="">
                        <?= $helper->input('text', 'nom', '', 'NOM') ?>
                        <?= $helper->input('text', 'prenom', '', 'Prénom') ?>
                        <?= $helper->input('text', 'pseudo', '', 'Pseudo de 15 caractères maximum') ?>
                        <?= $helper->input('email', 'email', '', 'Adresse email') ?>
                        <?= $helper->password('showMdp1()', 'motdepasse', 'motdepasse', 'Mot de passe') ?>
                        <?= $helper->password('showMdp2()', 'motdepasse2', 'motdepasse2', 'Confirmation du mot de passe') ?>
                        <div class="mb-3">
                            <div class="d-flex justify-content-center">
                                <div class="g-recaptcha" data-sitekey="cle_du_site"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="d-grid gap-2 col-12 mx-auto">
                                <?= $helper->button('submit', 'inscription', 'light', 'dark', 'Créer un compte'); ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
