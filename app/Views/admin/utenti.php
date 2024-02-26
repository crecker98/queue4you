<div class="container" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-xxl-9">
            <div class="card shadow">
                <?php
                if (isset($messaggio)) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert"
                         style="width:100%;margin: 0;">
                        <?= $messaggio ?>
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
                ?>
                <div class="card-header d-flex flex-wrap justify-content-center align-items-center justify-content-sm-between gap-3">
                    <h5 class="display-6 text-nowrap text-capitalize mb-0">Utenti</h5>
                    <div class="input-group input-group-sm w-auto"><input class="form-control form-control-sm"
                                                                          onkeyup="search()" id="myInput" type="text">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="myTable">
                            <thead>
                            <tr>
                                <th>Nominativo</th>
                                <th>Annunci</th>
                                <th>Commissioni</th>
                                <th>Stato</th>
                                <th class="text-center">Azioni</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($utenti as $utente) {
                                ?>
                                <tr>
                                    <td class="text-truncate"
                                        style="max-width: 200px;"><?= $utente->nome . " " . $utente->cognome ?></td>
                                    <td class="text-truncate" style="max-width: 200px;">xxx</td>
                                    <td>xxx</td>
                                    <td><?= $utente->stato == 1 ? "Attivo" : "Bannato" ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($utente->stato == 1) {
                                            ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                 fill="currentColor" viewBox="0 0 16 16"
                                                 class="bi bi-x-octagon-fill fs-5 text-primary"
                                                 onclick="bannaUtente('<?= $utente->codicefiscale ?>')"
                                                 style="margin-left: 10px;">
                                                <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"></path>
                                            </svg>
                                            <?php
                                        } else {
                                            ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                 fill="currentColor" viewBox="0 0 16 16"
                                                 class="bi bi-check-circle fs-5 text-primary"
                                                 onclick="attivaUtente('<?= $utente->codicefiscale ?>')"
                                                 style="margin-left: 10px;">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"></path>
                                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"></path>
                                            </svg>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>

<script>
    function attivaUtente(codicefiscale) {
        if (confirm("Sei sicuro di voler attivare l'utente?")) {
            window.location.href = "<?=base_url("admin/attivaUtente/")?>" + codicefiscale;
        }
    }

    function bannaUtente(codicefiscale) {
        if (confirm("Sei sicuro di voler bannare l'utente?")) {
            window.location.href = "<?=base_url("admin/bannaUtente/")?>" + codicefiscale;
        }
    }
</script>