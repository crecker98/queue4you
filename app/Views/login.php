<section class="py-4 py-md-5 my-5">
    <div class="container py-md-5">
        <div class="row">
            <div class="col-md-6 text-center"><img class="img-fluid w-100"
                                                   src="<?= base_url("assets/img/illustrations/login.svg") ?>"></div>
            <div class="col-md-5 col-xl-4 text-center text-md-start">
                <h2 class="display-6 fw-bold mb-5"><span class="underline pb-1"><strong>Login</strong><br></span></h2>
                <form method="post" data-bs-theme="light" action="<?= base_url("login") ?>">
                    <?php if (isset($errori)) { ?>
                        <div class="mb-3">
                            <div class="alert alert-danger" style="width: 100%!important;" role="alert">
                                <ul>
                                    <li><?= $errori ?></li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="mb-3"><input class="shadow form-control" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3"><input class="shadow form-control" type="password" name="password"
                                             placeholder="Password"></div>
                    <div class="mb-5">
                        <button class="btn btn-primary shadow" type="submit">Log in</button>
                    </div>
                </form>
                <p class="text-muted"><a href="#" data-bs-target="#modalResetPsw" data-bs-toggle="modal">Forgot your
                        password?</a></p>
            </div>
        </div>
    </div>
    <div class="modal" role="dialog" tabindex="-1" id="modalResetPsw">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Recupera password</h4>
                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formReset" method="post" action="<?= base_url("login/resetPassword") ?>">
                        <?php if (isset($erroriReset)) { ?>
                            <div class="mb-3">
                                <div class="alert alert-danger" style="width: 100%!important;" role="alert">
                                    <ul>
                                        <li><?= $erroriReset ?></li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                        <input class="form-control" type="email" name="email"
                               placeholder="Inserisci l'email che ricordi">
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">Annulla</button>
                    <button class="btn btn-primary" type="submit" form="formReset">Resetta</button>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($reset)) { ?>
        <script>
            alert("La tua nuova password è: password");
        </script>
    <?php } elseif (isset($erroriReset)) {
    ?>
        <script>
            $(window).on('load', function () {
                $('#modalResetPsw').modal('show');
            });
        </script>
        <?php
    } ?>
</section>