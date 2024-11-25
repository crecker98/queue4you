<?php
if (!isset($filtri)) {
    $filtri['prezzoMinimo'] = null;
    $filtri['dataInizio'] = null;
    $filtri['dataFine'] = null;
}

?>
<header class="pt-5">
    <div class="container pt-4 pt-xl-5">
        <form method="post">
            <div class="row" style="padding: 20px;">
                <div class="col"><input class="form-control" type="number" name="prezzoMinimo"
                                        value="<?= $filtri['prezzoMinimo'] ?>" min="0" placeholder="00.00"><span>Soglia di prezzo al minuto minima</span>
                </div>
                <div class="col"><input class="form-control" type="date" value="<?= $filtri['dataInizio'] ?>"
                                        name="dataInizio"><span>Data inizio attività</span></div>
                <div class="col"><input class="form-control" type="date" value="<?= $filtri['dataFine'] ?>"
                                        name="dataFine"><span>Termine massimo attività</span></div>
            </div>
            <div class="row" style="padding: 0px;text-align: center;">
                <div class="col">
                    <button class="btn btn-primary" type="submit">Filtra</button>
                </div>
            </div>
        </form>
    </div>
</header>
<hr>
<section>
    <div class="container py-4 py-xl-5">
        <?php
        if (isset($errori)) {
            ?>
            <div class="alert alert-danger" role="alert">
                <li><?= $errori ?></li>
            </div>
            <?php
        }
        ?>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-lg-3">
            <?php
            foreach ($annunci as $annuncio) {
                ?>
                <div class="col">
                    <div class="card border-light border-1 d-flex justify-content-center p-4">
                        <div class="card-body">
                            <div class="bs-icon-lg bs-icon-rounded bs-icon-secondary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-4 bs-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round" class="icon icon-tabler icon-tabler-school">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path>
                                    <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="fw-bold"><?= $annuncio->oggetto ?></h4>
                                <p class="text-muted"><?= $annuncio->indirizzo ?></p>
                                <p class="text-muted"
                                   style="text-align: right;"><?= number_format($annuncio->prezzominuto, 2, ",", ".") ?>
                                    € / min</p>
                                <button class="btn btn-sm px-0" type="button"
                                        data-bs-target="#modalDettaglioAnnucio-<?= $annuncio->codice ?>"
                                        data-bs-toggle="modal">Di più&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg"
                                                                                      width="1em" height="1em"
                                                                                      fill="currentColor"
                                                                                      viewBox="0 0 16 16"
                                                                                      class="bi bi-arrow-right">
                                        <path fill-rule="evenodd"
                                              d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"></path>
                                    </svg>
                                </button>
                                <div class="modal fade" role="dialog" tabindex="-1"
                                     id="modalDettaglioAnnucio-<?= $annuncio->codice ?>">
                                    <div class="modal-dialog" role="document">
                                        <form class="modal-content"
                                              action="<?= base_url('annunci/candidati/' . $annuncio->codice) ?>">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Dettaglio annuncio</h4>
                                                <button class="btn-close" type="button" aria-label="Close"
                                                        data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <div>
                                                            <h5>Oggetto</h5>
                                                            <p><?= $annuncio->oggetto ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div>
                                                            <h5><?= number_format($annuncio->prezzominuto, 2, ",", ".") ?>
                                                                €/minuto</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div>
                                                            <h5>Descrizione</h5>
                                                            <p><?= $annuncio->descrizione ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div>
                                                            <h5>Località</h5>
                                                            <p><?= $annuncio->desc ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div>
                                                            <h5>Indirizzo</h5>
                                                            <p><?= $annuncio->indirizzo ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-light" type="button" data-bs-dismiss="modal">
                                                    Chiudi
                                                </button>
                                                <?php
                                                if (isset($utente)) {
                                                    ?>
                                                    <button class="btn btn-primary" type="submit">Candidati</button>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>