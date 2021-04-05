
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="card mt-4 border border-5 reveal-1" style="max-width: 25rem; background-color: #2F4F4F; border-color: #87CEEB!important;">
                <div class="card-header" style="background-color: #2F4F4F;">
                    <h3 class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle text-light" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                    </h3>
                    <p class="text-light text-center fs-lg mt-4">Bonjour, veuillez-vous identifier.</p>
                </div>
                <div class="card-body" style="background-color: #2F4F4F;">
                    <form method="post" action="">
                        <?= $helper->input('text', 'pseudo', '', 'Pseudo') ?>
                        <?= $helper->input('password', 'motdepasse', '', 'Mot de passe') ?>
                        <?= $helper->checkbox('checkbox', 'remember-me', 'remember', 'Se souvenir de moi') ?>
                        <div class="d-flex justify-content-center">
                            <div class="d-grid gap-2 col-12 mx-auto">
                                <?= $helper->button('submit', 'connexion', 'dark', 'light', 'Connexion') ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-2">
                            <a class="btn text-light" href="recuperation-motdepasse">Mot de passe oublié ?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
