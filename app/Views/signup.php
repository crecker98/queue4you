<section class="py-4 py-md-5 my-5">
    <div class="container py-md-5">
        <div class="row">
            <div class="col-md-6 text-center"><img class="img-fluid w-100"
                                                   src="<?= base_url("assets/img/illustrations/register.svg") ?>"></div>

            <div class="col-md-5 col-xl-4 text-center text-md-start">
                <h2 class="display-6 fw-bold mb-5"><span class="underline pb-1"><strong>Registrazione</strong></span>
                </h2>
                <?php if (isset($messaggio)) { ?>
                    <div class="alert alert-primary" role="alert"><?= $messaggio ?></div>
                <?php } else { ?>
                    <form method="post" data-bs-theme="light" enctype="multipart/form-data">
                        <?php if (isset($errori)) { ?>
                            <div class="mb-3">
                                <div class="alert alert-danger" style="width: 100%!important;" role="alert">
                                    <ul>
                                        <?php foreach ($errori as $errore) { ?>
                                            <li><?= $errore ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="mb-3"><input class="form-control" type="text" name="codicefiscale"
                                                 placeholder="Codice Fiscale" required=""></div>
                        <div class="mb-3"><input class="form-control" type="text" name="nome" placeholder="Nome"
                                                 required=""></div>
                        <div class="mb-3"><input class="form-control" type="text" name="cognome" placeholder="Cognome"
                                                 required=""></div>
                        <div class="mb-3"><input class="form-control" type="text" name="telefono" placeholder="Telefono"
                                                 required=""></div>
                        <div class="mb-3"><input class="form-control" type="file" name="foto" placeholder="Telefono"
                                                 required=""><span>Foto profilo</span></div>
                        <div class="mb-3"><select class="form-select" name="localitacompetenza" required="">
                                <option value="" selected="" disabled>Seleziona una località</option>
                                <?php foreach ($localita

                                as $row) ?>
                                <option value="<?= $row->codice ?>"><?= $row->descrizione ?></option>
                            </select><span>Località di competenza</span></div>
                        <div class="mb-3"><input class="shadow-sm form-control" type="email" name="email"
                                                 placeholder="Email" required=""></div>
                        <div class="mb-3"><input class="shadow-sm form-control" type="password" name="password"
                                                 placeholder="Password" required=""></div>
                        <div class="mb-3"><input class="shadow-sm form-control" type="password" name="password_repeat"
                                                 placeholder="Repeat Password" required=""></div>
                        <div class="mb-5">
                            <button class="btn btn-primary shadow" type="submit">Crea account</button>
                        </div>
                    </form>
                <?php } ?>
                <p class="text-muted">Sei già registrato? <a href="login.html">Log in&nbsp;<svg
                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icon-tabler-arrow-narrow-right">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l14 0"></path>
                            <path d="M15 16l4 -4"></path>
                            <path d="M15 8l4 4"></path>
                        </svg>
                    </a>&nbsp;
                </p>
            </div>
        </div>
    </div>
</section>