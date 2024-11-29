<header class="pt-5">
    <div class="container profile profile-view" id="profile">
        <div>
        <?php if (isset($errori)) { ?>
                            <div class="alert alert-danger" style="width: 100%" role="alert">
                                <ul>
                                    <?php foreach ($errori as $errore) { ?>
                                        <li><?= $errore ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                        <?php if (isset($messaggio)) { ?>
                            <div class="alert alert-success" style="width: 100%" role="alert">
                                <?= $messaggio ?>
                            </div>
                        <?php } ?>
            <div class="row profile-row">
                <div class="col-md-4 relative">
                    <div>
                        <div class="row">
                            <div class="col">
                                <h1>Wallet:&nbsp;</h1>
                            </div>
                            <div class="col text-end d-lg-flex justify-content-lg-end align-items-lg-end">
                                <p style="font-size: 20px;"><?= number_format($utente->wallet, 2, ",", ".") ?> €</p>
                            </div>
                        </div>
                        <div style="text-align: center;margin-top: 15px;">
                            <button class="btn btn-primary" type="button" data-bs-target="#modalAggiungiSaldo"
                                    data-bs-toggle="modal">Aggiungi saldo
                            </button>
                        </div>
                    </div>
                    <div class="modal fade" role="dialog" tabindex="-1" id="modalAggiungiSaldo">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ricarica conto</h4>
                                    <button class="btn-close" type="button" aria-label="Close"
                                            data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="payment-form" method="post"
                                          action="<?= base_url("areaRiservata/ricaricaWallet") ?>">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group mb-3"><label class="form-label" for="cardNumber">Importo</label>
                                                    <div class="input-group"><input class="form-control" type="number"
                                                                                    step="0.01" name="importo"
                                                                                    id="importo" required=""
                                                                                    placeholder="Inserisci un importo"><span
                                                                class="input-group-text"><i
                                                                    class="fa fa-credit-card"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group mb-3"><label class="form-label" for="cardNumber">Numero
                                                        carta</label>
                                                    <div class="input-group"><input class="form-control" type="tel"
                                                                                    id="cardNumber" required=""
                                                                                    placeholder="Valid Card Number"><span
                                                                class="input-group-text"><i
                                                                    class="fa fa-credit-card"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="form-group mb-3"><label class="form-label" for="cardExpiry"><span>Scadenza&nbsp;</span><span></span></label><input
                                                            class="form-control" type="tel" id="cardExpiry" required=""
                                                            placeholder="MM / YY"></div>
                                            </div>
                                            <div class="col-5 pull-right">
                                                <div class="form-group mb-3"><label class="form-label"
                                                                                    for="cardCVC">CVC</label><input
                                                            class="form-control" type="tel" id="cardCVC" required=""
                                                            placeholder="CVC"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer"><img class="img-fluid panel-title-image"
                                                               src="<?= base_url("assets/img/accepted_cards.png") ?>">
                                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">Annulla</button>
                                    <button class="btn btn-primary" type="submit" form="payment-form">Carica</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">


                    <h1>Profilo - <?= $utente->codicefiscale ?></h1>
                    <hr>
                    <form method="post" action="<?= base_url("areaRiservata") ?>" enctype="multipart/form-data">
                        <div class="avatar">
                            <?php
                            $immagine = "https://www.gravatar.com/avatar/1234566?size=200&d=mm";
                            if (strlen($utente->foto) > 0) {
                                $immagine = base_url("uploads/" . $utente->foto);
                            }
                            ?>
                            <div class="avatar-bg center" style="background: url('<?php echo $immagine ?>');"></div>
                        </div>
                        <input class="form-control form-control" type="file" name="foto">
                        <input name="codicefiscale" type="hidden" value="<?= $utente->codicefiscale ?>">
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3"><label class="form-label">Nome</label><input
                                            class="form-control" type="text" required value="<?= $utente->nome ?>"
                                            name="nome"></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3"><label class="form-label">Cognome</label><input
                                            class="form-control" type="text" required value="<?= $utente->cognome ?>"
                                            name="cognome"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3"><label class="form-label">Telefono</label><input
                                            class="form-control" required value="<?= $utente->telefono ?>" type="text"
                                            name="telefono"></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3"><label class="form-label">Località</label><select
                                            class="form-select" name="localitacompetenza">
                                        <option value="" selected="" disabled>Seleziona una località</option>
                                        <?php foreach ($localita as $row) { ?>
                                            <option <?= $row->codice == $utente->localitacompetenza ? "selected" : "" ?>
                                                    value="<?= $row->codice ?>"><?= $row->descrizione ?></option>
                                        <?php } ?>
                                    </select></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3"><label class="form-label">Email </label><input required
                                                                                                            value="<?= $utente->email ?>"
                                                                                                            class="form-control"
                                                                                                            type="email"
                                                                                                            autocomplete="off"
                                                                                                            name="email">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3"><label class="form-label">Password </label><input
                                            class="form-control" type="password" name="password" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 content-right">
                                <button class="btn btn-primary form-btn" type="submit">Aggiorna</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<hr>
<div class="container">
    <div>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-1">Commissioni</a>
            </li>
            <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab"
                                                        href="#tab-2">Annunci</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="tab-1">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-xxl-9">
                        <div class="card shadow">
                            <div class="card-header d-flex flex-wrap justify-content-center align-items-center justify-content-sm-between gap-3">
                                <h5 class="display-6 text-nowrap text-capitalize mb-0">Commissioni</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Oggetto</th>
                                            <th>Indirizzo</th>
                                            <th>Committente</th>
                                            <th>Data ora inizio</th>
                                            <th>Termine completamento</th>
                                            <th>Stato</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($commissioni as $commissione) {
                                            ?>
                                        <tr>
                                            <td class="text-truncate"
                                                style="max-width: 200px;"><?= $commissione->oggetto ?></td>
                                            <td class="text-truncate"
                                                style="max-width: 200px;"><?= $commissione->indirizzo ?></td>
                                            <td><?= $commissione->nome . " " . $commissione->cognome ?></td>
                                            <td><?= is_null($commissione->orainizioattivita) ? "Da definire" : date('d/m/Y H:i', strtotime($commissione->orainizioattivita)) ?></td>
                                            <td><?= is_null($commissione->orafineattivita) ? "Da definire" : date('d/m/Y H:i', strtotime($commissione->orafineattivita)) ?></td>
                                            <td><?
                                                switch ($commissione->scand) {
                                                    case 1:
                                                        echo "Accettato";
                                                        break;
                                                    case 2:
                                                        echo "Rifiutato";
                                                        break;
                                                    case 3:
                                                        echo "In corso";
                                                        break;
                                                    case 4:
                                                        echo "Completato";
                                                        break;
                                                    default:
                                                        echo "Evaso";
                                                        break;
                                                }
                                                ?></td>
                                            <td class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                     fill="currentColor" viewBox="0 0 16 16"
                                                     onclick="window.location.href='<?= base_url("annunci") ?>'"
                                                     class="bi bi-eye-fill fs-5 text-primary">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"></path>
                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                     fill="currentColor" viewBox="0 0 16 16"
                                                     onclick="deleteCommissione(<?= $commissione->codice ?>)"
                                                     class="bi bi-trash fs-5 text-danger" style="margin-left: 10px;">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"></path>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"></path>
                                                </svg>
                                                <?php
                                                if (is_null($commissione->orainizioattivita)) {
                                                    ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                     fill="currentColor" viewBox="0 0 16 16"
                                                     class="bi bi-check2-square fs-5 text-success"
                                                     onclick="iniziaAttivita(<?= $commissione->codice ?>)"
                                                     style="margin-left: 10px;">
                                                    <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z"></path>
                                                    <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0"></path>
                                                </svg>
                                                <?php } elseif (is_null($commissione->orafineattivita)) { ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                         fill="currentColor" viewBox="0 0 16 16"
                                                         class="bi bi-check2-square fs-5 text-danger"
                                                         onclick="finishAttivita(<?= $commissione->codice ?>)"
                                                         style="margin-left: 10px;">
                                                        <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z"></path>
                                                        <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0"></path>
                                                    </svg>
                                                <?php } ?>
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
            <div class="tab-pane active" role="tabpanel" id="tab-2">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-xxl-9">
                        <div class="card shadow">
                            <div class="card-header d-flex flex-wrap justify-content-center align-items-center justify-content-sm-between gap-3">
                                <div class="row" style="width: 100%;">
                                    <div class="col">
                                        <h5 class="display-6 text-nowrap text-capitalize mb-0">i miei annunci</h5>
                                    </div>
                                    <div class="col">
                                        <div style="width: 100%;text-align: right;">
                                            <div class="modal fade" role="dialog" tabindex="-1" id="modalAggiungi">
                                                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
                                                     role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Aggiungi annuncio</h4>
                                                            <button class="btn-close" type="button" aria-label="Close"
                                                                    data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body text-start">
                                                            <form id="aggiungiAnnuncio" method="post"
                                                                  action="<?= base_url("/areaRiservata/inserisciAnnuncio") ?>">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div><span>Data e ora di inizio necessità</span>
                                                                            <input class="form-control"
                                                                                   min="<?= date('Y-m-d H:i') ?>"
                                                                                   value="<?= date('Y-m-d H:i') ?>"
                                                                                   type="datetime-local"
                                                                                   name="dataorainizionecessita"
                                                                                   required=""></div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div><span>Scadenza massima</span>
                                                                            <input class="form-control"
                                                                                   name="dataoramassimacompletamento"
                                                                                   min="<?= date('Y-m-d H:i') ?>"
                                                                                   value="<?= date('Y-m-d H:i') ?>"
                                                                                   type="datetime-local"></div>
                                                                    </div>
                                                                </div>
                                                                <input class="form-control" type="text"
                                                                       style="margin-top: 15px;" name="oggetto"
                                                                       placeholder="Oggetto" required="">
                                                                <textarea class="form-control" style="margin-top: 15px;"
                                                                          name="descrizione" placeholder="Descrizione"
                                                                          required=""></textarea>
                                                                <input class="form-control" type="text"
                                                                       style="margin-top: 15px;" name="indirizzo"
                                                                       placeholder="Indirizzo" required="">
                                                                <input class="form-control" type="number" step="0.01"
                                                                       style="margin-top: 15px;" name="prezzominuto"
                                                                       placeholder="Prezzo al minuto" required="">
                                                                <select class="form-select" style="margin-top: 15px;"
                                                                        name="localita" required="">
                                                                    <option value="" selected="" disabled>Seleziona una
                                                                        località
                                                                    </option>
                                                                    <?php foreach ($localita as $row) { ?>
                                                                        <option value="<?= $row->codice ?>"><?= $row->descrizione ?></option>
                                                                    <?php } ?>
                                                                </select><span>Località</span>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-light" type="button"
                                                                    data-bs-dismiss="modal">Annulla
                                                            </button>
                                                            <button class="btn btn-primary" type="submit"
                                                                    form="aggiungiAnnuncio">Inserisci
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="button"
                                                    data-bs-target="#modalAggiungi" data-bs-toggle="modal">Aggiungi
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Oggetto</th>
                                            <th>Esecutore</th>
                                            <th>Stato annuncio</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($annunci as $annuncio) {
                                            ?>
                                            <tr>
                                                <td class="text-truncate"
                                                    style="max-width: 200px;"><?= $annuncio->oggetto ?></td>
                                                <td class="text-truncate"
                                                    style="max-width: 200px;"><?= is_null($annuncio->esecutore) ? "Non definito" : $annuncio->esecutore->nome . " " . $annuncio->esecutore->cognome ?></td>
                                                <td class="text-truncate" style="max-width: 200px;"><?
                                                    if (is_null($annuncio->esecutore)) {
                                                        echo "In corso";
                                                    } else {
                                                        switch ($annuncio->esecutore->statocandidature) {
                                                            case 1:
                                                                echo "Accettato";
                                                                break;
                                                            case 3:
                                                                echo "In corso";
                                                                break;
                                                            case 4:
                                                                echo "Completato";
                                                                break;
                                                            default:
                                                                echo "Evaso";
                                                                break;
                                                        }
                                                    }
                                                    ?></td>
                                                <td class="text-center">
                                                    <div class="modal fade" role="dialog" tabindex="-1"
                                                         id="modalSegnalazioneAnnuncio-<?= $annuncio->codice ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Segnalazione</h4>
                                                                    <button class="btn-close" type="button"
                                                                            aria-label="Close"
                                                                            data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form id="segnalazioneForm"
                                                                          action="<?= base_url("areaRiservata/segnala/" . $annuncio->codice . "/" . $annuncio->esecutore->codicefiscale) ?>"
                                                                          method="post"><textarea
                                                                                class="form-control" name="messaggio"
                                                                                placeholder="Testo segnalazione"></textarea>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-light" type="button"
                                                                            data-bs-dismiss="modal">Chiudi
                                                                    </button>
                                                                    <button class="btn btn-primary" type="submit"
                                                                            form="segnalazioneForm">Invia
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" role="dialog" tabindex="-1"
                                                         id="modalCandidati-<?= $annuncio->codice ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Candidati annuncio</h4>
                                                                    <button class="btn-close" type="button"
                                                                            aria-label="Close"
                                                                            data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-xl-10 col-xxl-9">
                                                                            <div class="card shadow">
                                                                                <div class="card-body">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-striped table-hover">
                                                                                            <thead>
                                                                                            <tr>
                                                                                                <th>Nominativo</th>
                                                                                                <th>Valutazione media
                                                                                                </th>
                                                                                                <th class="text-center">
                                                                                                    Actions
                                                                                                </th>
                                                                                            </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                            <?php
                                                                                            foreach ($annuncio->candidature as $candidati) {
                                                                                                ?>
                                                                                            <tr>
                                                                                                <td class="text-truncate"
                                                                                                    style="max-width: 200px;">
                                                                                                    <?= $candidati->nome . " " . $candidati->cognome ?>
                                                                                                </td>
                                                                                                <td class="text-truncate"
                                                                                                    style="max-width: 200px;">
                                                                                                    <?= intval($candidati->mediaVal) == 0 ? "Non definita" : intval($candidati->mediaVal) ?>
                                                                                                </td>
                                                                                                <td class="text-center">
                                                                                                    <?php
                                                                                                    if (is_null($annuncio->esecutore)) {
                                                                                                        ?>
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                         width="1em"
                                                                                                         height="1em"
                                                                                                         onclick="scegliCandidato(<?= $annuncio->codice ?>, '<?= $candidati->codicefiscale ?>')"
                                                                                                         fill="currentColor"
                                                                                                         viewBox="0 0 16 16"
                                                                                                         class="bi bi-check-circle fs-5 text-primary">
                                                                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"></path>
                                                                                                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"></path>
                                                                                                    </svg>
                                                                                                    <?php } ?>
                                                                                                    <a href="#"
                                                                                                       style="margin-left: 15px;"
                                                                                                       data-bs-target="#modal-1"
                                                                                                       data-bs-toggle="modal">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                             width="1em"
                                                                                                             height="1em"
                                                                                                             onclick="window.location.href='<?= base_url("esecutori") ?>'"
                                                                                                             fill="currentColor"
                                                                                                             viewBox="0 0 16 16"
                                                                                                             class="bi bi-eye-fill fs-5 text-primary">
                                                                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"></path>
                                                                                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"></path>
                                                                                                        </svg>
                                                                                                    </a></td>
                                                                                            </tr>
                                                                                            <?php } ?>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-light" type="button"
                                                                            data-bs-dismiss="modal">Chiudi
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" role="dialog" tabindex="-1"
                                                         id="modalRecensisci-<?= $annuncio->codice ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Lascia un commento</h4>
                                                                    <button class="btn-close" type="button"
                                                                            aria-label="Close"
                                                                            data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form id="recensisci-id"
                                                                          action="<?= base_url('areaRiservata/recensisci/' . $annuncio->codice . "/" . $annuncio->esecutore->codicefiscale) ?>"
                                                                          method="post">
                                                                        <select class="form-select" required
                                                                                name="valutazione">
                                                                            <option>1</option>
                                                                            <option>2</option>
                                                                            <option>3</option>
                                                                            <option>4</option>
                                                                            <option>5</option>
                                                                        </select>
                                                                        <textarea class="form-control"
                                                                                           style="margin-top: 10px;"
                                                                                           name="commento"
                                                                                           placeholder="Commento"></textarea>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-light" type="button"
                                                                            data-bs-dismiss="modal">Annulla
                                                                    </button>
                                                                    <button class="btn btn-primary" type="submit"
                                                                            form="recensisci-id">Salva
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                         fill="currentColor" viewBox="0 0 16 16"
                                                         onclick="window.location.href='<?= base_url("annunci") ?>'">
                                                         class="bi bi-eye-fill fs-5 text-primary">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"></path>
                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"></path>
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                         fill="currentColor" viewBox="0 0 16 16"
                                                         class="bi bi-trash fs-5 text-danger"
                                                         onclick="deleteAnnuncio('<?= $annuncio->codice ?>')"
                                                         style="margin-left: 10px;">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"></path>
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"></path>
                                                    </svg>
                                                    <?php
                                                    if (!is_null($annuncio->esecutore)) {
                                                        ?>
                                                        <?php
                                                        if (!$annuncio->isPagato && $annuncio->esecutore->statocandidature == 4) {
                                                            ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                         fill="currentColor" viewBox="0 0 16 16"
                                                         class="bi bi-check2-all fs-5 text-primary"
                                                         onclick="pagaAttivita(<?= $annuncio->codice ?>, <?= $annuncio->esecutore->codcand ?>)"
                                                         style="margin-left: 10px;">
                                                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"></path>
                                                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708"></path>
                                                    </svg>
                                                        <?php } ?>
                                                        <?php
                                                        if (!$annuncio->isRecensito) {
                                                            ?>
                                                            <a href="#"
                                                               data-bs-target="#modalRecensisci-<?= $annuncio->codice ?>"
                                                       data-bs-toggle="modal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                             fill="currentColor" viewBox="0 0 16 16"
                                                             class="bi bi-star-fill fs-5 text-primary"
                                                             style="margin-left: 10px;">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                        </svg>
                                                            </a>
                                                        <?php } ?>
                                                        <?php
                                                        if (!$annuncio->isPreferito) {
                                                            ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                             fill="currentColor" viewBox="0 0 16 16"
                                                             onclick="aggiungiPreferito('<?= $annuncio->esecutore->codicefiscale ?>')"
                                                             class="bi bi-stars fs-5 text-primary"
                                                             style="margin-left: 10px;">
                                                            <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"></path>
                                                        </svg>
                                                        <?php } ?>
                                                        <?php
                                                        if (!$annuncio->isSegnalato) {
                                                            ?>
                                                            <a href="#"
                                                               data-bs-target="#modalSegnalazioneAnnuncio-<?= $annuncio->codice ?>"
                                                               data-bs-toggle="modal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                             fill="currentColor" viewBox="0 0 16 16"
                                                             class="bi bi-exclamation-triangle-fill fs-5 text-primary"
                                                             style="margin-left: 10px;">
                                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"></path>
                                                        </svg>
                                                            </a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <a href="#"
                                                       data-bs-target="#modalCandidati-<?= $annuncio->codice ?>"
                                                           data-bs-toggle="modal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                             fill="currentColor" viewBox="0 0 16 16"
                                                             class="bi bi-person-fill fs-5 text-primary"
                                                             style="margin-left: 10px;">
                                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"></path>
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
        </div>
    </div>
</div>

<script>
    function deleteAnnuncio(codice) {
        if (confirm("Sei sicuro di voler eliminare l'annuncio?")) {
            window.location.href = "<?=base_url("areaRiservata/eliminaAnnuncio/")?>" + codice;
        }
    }

    function scegliCandidato(codiceAnnuncio, codicefiscale) {
        if (confirm("Sei sicuro di voler scegliere questo candidato?")) {
            window.location.href = "<?=base_url("areaRiservata/scegliCandidato/")?>" + codiceAnnuncio + "/" + codicefiscale;
        }
    }

    function aggiungiPreferito(codicefiscale) {
        if (confirm("Sei sicuro di voler aggiungere questo esecutore ai preferiti?")) {
            window.location.href = "<?=base_url("areaRiservata/aggiungiPreferito/")?>" + codicefiscale;
        }
    }

    function deleteCommissione(codice) {
        if (confirm("Sei sicuro di voler eliminare la commissione?")) {
            window.location.href = "<?=base_url("areaRiservata/eliminaCommissione/")?>" + codice;
        }
    }

    function iniziaAttivita(codice) {
        if (confirm("Sei sicuro di voler iniziare l'attività?")) {
            window.location.href = "<?=base_url("areaRiservata/iniziaAttivita/")?>" + codice;
        }
    }

    function finishAttivita(codice) {
        if (confirm("Sei sicuro di voler terminare l'attività?")) {
            window.location.href = "<?=base_url("areaRiservata/terminaAttivita/")?>" + codice;
        }
    }

    function pagaAttivita(codice, codiceCand) {
        if (confirm("Sei sicuro di voler pagare l'attività?")) {
            window.location.href = "<?=base_url("areaRiservata/pagaAttivita/")?>" + codice + "/" + codiceCand;
        }
    }

</script>