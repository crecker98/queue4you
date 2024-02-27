<section style="margin-top: 100px;">
    <div class="container py-4 py-xl-5">
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-lg-3">
            <?php
            foreach ($esecutori as $esecutore) {
                ?>
                <div class="col">
                    <div class="card border-light border-1 d-flex justify-content-center p-4">
                        <div class="card-body">
                            <div>
                                <hr>
                                <h4 class="fw-bold"><?= $esecutore->nome . " " . $esecutore->cognome ?></h4>
                                <p class="text-muted"><?= $esecutore->valutazioneMedia ?></p>
                                <button class="btn btn-sm px-0" type="button"
                                        data-bs-target="#modalDettaglio-<?= $esecutore->codicefiscale ?>"
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
                                     id="modalDettaglio-<?= $esecutore->codicefiscale ?>">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Dettaglio esecutore</h4>
                                                <button class="btn-close" type="button" aria-label="Close"
                                                        data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <div></div>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table">

                                                        <thead>
                                                        <tr>
                                                            <th>Valutazione</th>
                                                            <th>Commento</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        foreach ($esecutore->recensioni as $recensione) {
                                                            ?>
                                                            <tr>
                                                                <td><?= $recensione->valutazione ?></td>
                                                                <td><?= $recensione->commento ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-light" type="button" data-bs-dismiss="modal">
                                                    Chiudi
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>