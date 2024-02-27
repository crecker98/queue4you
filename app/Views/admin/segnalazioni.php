<div class="container" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-xxl-9">
            <div class="card shadow">
                <div class="card-header d-flex flex-wrap justify-content-center align-items-center justify-content-sm-between gap-3">
                    <h5 class="display-6 text-nowrap text-capitalize mb-0">Segnalazione</h5>
                    <div class="input-group input-group-sm w-auto"><input class="form-control form-control-sm"
                                                                          onkeyup="search()"
                                                                          id="myInput"
                                                                          type="text">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="myTable">
                            <thead>
                            <tr>
                                <th>Nominativo</th>
                                <th>Annuncio</th>
                                <th>Data inserimento</th>
                                <th class="text-center">Azioni</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($segnalazioni as $segnalazione) {
                                ?>
                            <tr>
                                <td class="text-truncate"
                                    style="max-width: 200px;"><?= $segnalazione->utenteSegnalato->nome . " " . $segnalazione->utenteSegnalato->cognome ?></td>
                                <td class="text-truncate" style="max-width: 200px;"><?= $segnalazione->oggetto ?></td>
                                <td><?= date("d/m/Y H:i", strtotime($segnalazione->data)) ?></td>
                                <td class="text-center">
                                    <div class="modal fade" role="dialog" tabindex="-1"
                                         id="modalSingleSegnalazione-<?= $segnalazione->codice ?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Info segnalazione
                                                        - <?= date("d/m/Y H:i", strtotime($segnalazione->data)) ?></h4>
                                                    <button class="btn-close" type="button" aria-label="Close"
                                                            data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="text-start">
                                                                <h4>Annuncio</h4>
                                                                <p><?= $segnalazione->oggetto ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="text-start">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h4>Segnalante</h4>
                                                                    </div>
                                                                    <div class="col text-end">
                                                                        <a href="mailto:<?= $segnalazione->utenteCheSegnala->email ?>">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="1em" height="1em"
                                                                             fill="currentColor" viewBox="0 0 16 16"
                                                                             class="bi bi-messenger"
                                                                             style="font-size: 20px;">
                                                                            <path d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.639.639 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.639.639 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76m5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z"></path>
                                                                        </svg>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <p><?= $segnalazione->utenteCheSegnala->nome . " " . $segnalazione->utenteCheSegnala->cognome ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="text-start">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h4>Segnalato</h4>
                                                                    </div>
                                                                    <div class="col text-end">
                                                                        <a href="mailto:<?= $segnalazione->utenteSegnalato->email ?>">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="1em" height="1em"
                                                                             fill="currentColor" viewBox="0 0 16 16"
                                                                             class="bi bi-messenger"
                                                                             style="font-size: 20px;">
                                                                            <path d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.639.639 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.639.639 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76m5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z"></path>
                                                                        </svg>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <p><?= $segnalazione->utenteSegnalato->nome . " " . $segnalazione->utenteSegnalato->cognome ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="text-start">
                                                                <h4>Messaggio</h4>
                                                                <p><?= $segnalazione->messaggio ?></p>
                                                            </div>
                                                        </div>
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
                                    <a href="#" data-bs-target="#modalSingleSegnalazione-<?= $segnalazione->codice ?>"
                                       data-bs-toggle="modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                             fill="currentColor" viewBox="0 0 16 16"
                                             class="bi bi-eye-fill fs-5 text-primary" style="margin-left: 10px;">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"></path>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>