<header class="pt-5">
    <div class="container pt-4 pt-xl-5">
        <div class="row pt-5">
            <div class="col-md-8 text-center text-md-start mx-auto">
                <div class="text-center">
                    <h1 class="display-4 fw-bold mb-5">QUEUE FOR YOU</h1>
                    <p class="fs-5 text-muted mb-5">Don’t worry about queue: we do it for you!!</p>
                </div>
            </div>
            <div class="col-12 col-lg-10 mx-auto">
                <div class="text-center position-relative"><img class="img-fluid"
                                                                src="<?= base_url("assets/img/_2443fb7a-93d8-4619-a13b-36d99c0c0e77.jpg") ?>"
                                                                style="width: 800px;"></div>
            </div>
        </div>
    </div>
</header>
<section>
    <div class="container py-4 py-xl-5">
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
                            <p class="text-muted"><?= $annuncio->descrizione ?></p>
                            <button class="btn btn-sm px-0" type="button">Di più&nbsp;&nbsp;<svg
                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                        viewBox="0 0 16 16" class="bi bi-arrow-right">
                                    <path fill-rule="evenodd"
                                          d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<section>
    <div class="container py-4 py-xl-5">
        <div class="row">
            <div class="col-md-6">
                <h6 class="display-15 fw-bold pb-md-4"></h6>
            </div>
            <div class="col-md-6 pt-4">
                <p class="text-muted mb-4">Immaginiamo un mondo in cui le persone possano dedicare più tempo alle cose che amano, mentre qualcun altro si occupa delle code e delle attese al loro posto.</p>
            </div>
        </div>
        <div class="row gy-4 gy-md-0">
            <div class="col-md-6 d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center"
                 style="padding: 50px;">
                <div>
                    <div class="row gy-2 row-cols-1 row-cols-sm-2">
                        <div class="col text-center text-md-start">
                            <div class="d-flex justify-content-center align-items-center justify-content-md-start">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="icon icon-tabler icon-tabler-sun fs-3 text-primary bg-secondary">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                    <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                                </svg>
                                <h5 class="fw-bold mb-0 ms-2">Massimizzare l’efficienza:</h5>
                            </div>
                            <p class="text-muted my-3">Vogliamo massimizzare l’efficienza delle attività quotidiane degli utenti. Che si tratti di code, prenotazioni o altre attese, Q4U interviene al loro posto, facendo guadagnare loro tempo prezioso..</p>
                        </div>
                        <div class="col text-center text-md-start">
                            <div class="d-flex justify-content-center align-items-center justify-content-md-start">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="icon icon-tabler icon-tabler-sun fs-3 text-primary bg-secondary">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                    <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                                </svg>
                                <h5 class="fw-bold mb-0 ms-2"><strong>Ridurre lo stress:</strong></h5>
                            </div>
                            <p class="text-muted my-3">Desideriamo ridurre lo stress legato alle attese. Fare la fila può essere frustrante, ma con Q4U, gli utenti possono rilassarsi e non preoccuparsi delle attese.</p>
                        </div>
                        <div class="col text-center text-md-start">
                            <div class="d-flex justify-content-center align-items-center justify-content-md-start">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="icon icon-tabler icon-tabler-sun fs-3 text-primary bg-secondary">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                    <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                                </svg>
                                <h5 class="fw-bold mb-0 ms-2"><strong>Risparmiare tempo prezioso:</strong></h5>
                            </div>
                            <p class="text-muted my-3">La nostra app si impegna a salvare i momenti preziosi degli utenti. Gestendo le code, restituiamo alle persone istanti che possono dedicare ai propri cari, alle passioni o semplicemente al relax.</p>
                        </div>
                        <!--<div class="col text-center text-md-start">
                            <div class="d-flex justify-content-center align-items-center justify-content-md-start">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="icon icon-tabler icon-tabler-sun fs-3 text-primary bg-secondary">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                    <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                                </svg>
                                <h5 class="fw-bold mb-0 ms-2"><strong>festures 1</strong></h5>
                            </div>
                            <p class="text-muted my-3">Auctor nisi et, habitant gravida ad lectus posuere.</p>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="col-md-6 order-first order-md-last">
                <div><img class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;"
                          src="<?= base_url("assets/img/illustrations/teamwork.svg") ?>"></div>
            </div>
        </div>
    </div>
</section>
<section class="py-4 py-xl-5 mb-5">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2 class="display-6 fw-bold mb-5"><span class="pb-3 underline">FAQ<br></span></h2>
                <p class="text-muted mb-5">Il sito ti permette di evitare file delegando compiti e servizi.  Potrai pubblicare un annuncio, consentendo ad altri di candidarsi per svolgere ciò che non vuoi o non puoi fare tu.</p>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-8 mx-auto">
                <div class="accordion text-muted" role="tablist" id="accordion-1">
                    <div class="accordion-item">
                        <h2 class="accordion-header" role="tab">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-1 .item-1" aria-expanded="false"
                                    aria-controls="accordion-1 .item-1">Il sito ti permette di evitare file delegando compiti e servizi.  Potrai pubblicare un annuncio, consentendo ad altri di candidarsi per svolgere ciò che non vuoi o non puoi fare tu.
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-1" role="tabpanel" data-bs-parent="#accordion-1">
                            <div class="accordion-body">
                                <p>Q4U è un sito in cui gli utenti possono postare richieste di servizi, e altri utenti possono prendere il loro posto in fila o svolgere il servizio al loro posto.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" role="tab">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-1 .item-2" aria-expanded="false"
                                    aria-controls="accordion-1 .item-2">Come funziona il sistema di tariffa al minuto?
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-2" role="tabpanel" data-bs-parent="#accordion-1">
                            <div class="accordion-body">
                                <p class="mb-0">I committenti pagano per i servizi in base al tempo effettivo impiegato, dopo aver prestabilito la tariffa al minuto.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" role="tab">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-1 .item-3" aria-expanded="false"
                                    aria-controls="accordion-1 .item-3">Quali tipi di servizi sono disponibili su Q4U?
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-3" role="tabpanel" data-bs-parent="#accordion-1">
                            <div class="accordion-body">
                                <p class="mb-0">Il sito accoglie una vasta gamma di richieste di servizi, dalle code in attesa ai servizi di consegna e altro ancora.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" role="tab">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-1 .item-3" aria-expanded="false"
                                    aria-controls="accordion-1 .item-3">Come posso registrarmi su Q4U?
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-3" role="tabpanel" data-bs-parent="#accordion-1">
                            <div class="accordion-body">
                                <p class="mb-0">Per registrarti, visita il sito ufficiale di Q4U e segui le istruzioni per creare un account.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" role="tab">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-1 .item-3" aria-expanded="false"
                                    aria-controls="accordion-1 .item-3">Quali metodi di pagamento accetta Q4U?
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-3" role="tabpanel" data-bs-parent="#accordion-1">
                            <div class="accordion-body">
                                <p class="mb-0">Q4U accetta pagamenti tramite il tuo portafoglio personale che potrai ricaricare nella sezione dedicata.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" role="tab">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-1 .item-3" aria-expanded="false"
                                    aria-controls="accordion-1 .item-3">Come funziona il sistema di valutazione degli utenti?
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-3" role="tabpanel" data-bs-parent="#accordion-1">
                            <div class="accordion-body">
                                <p class="mb-0">Il sito accoglie una vasta gamma di richieste di servizi, dalle code in attesa ai servizi di consegna e altro ancora.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" role="tab">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-1 .item-3" aria-expanded="false"
                                    aria-controls="accordion-1 .item-3">Posso offrire servizi su Q4U? 
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-3" role="tabpanel" data-bs-parent="#accordion-1">
                            <div class="accordion-body">
                                <p class="mb-0">ssolutamente! Gli utenti possono registrarsi come fornitori di servizi e rispondere alle richieste degli altri utenti.</p>
                            </div>
                        </div>
                    </div><div class="accordion-item">
                        <h2 class="accordion-header" role="tab">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-1 .item-3" aria-expanded="false"
                                    aria-controls="accordion-1 .item-3">Posso vedere le recensioni degli altri utenti prima di accettare un servizio?
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-3" role="tabpanel" data-bs-parent="#accordion-1">
                            <div class="accordion-body">
                                <p class="mb-0">Sì, gli utenti possono visualizzare le recensioni e le valutazioni degli altri utenti prima di prendere una decisione.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" role="tab">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-1 .item-3" aria-expanded="false"
                                    aria-controls="accordion-1 .item-3">Qual è il limite di tempo per completare un’attività?
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-3" role="tabpanel" data-bs-parent="#accordion-1">
                            <div class="accordion-body">
                                <p class="mb-0">Il committente dell’attività stabilirà entro quale termine l’attività deve essere svolta.</p>
                            </div>
                        </div>
                    </div><div class="accordion-item">
                        <h2 class="accordion-header" role="tab">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-1 .item-3" aria-expanded="false"
                                    aria-controls="accordion-1 .item-3">Qual è il prezzo al minuto per candidarsi a un servizio?
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-3" role="tabpanel" data-bs-parent="#accordion-1">
                            <div class="accordion-body">
                                <p class="mb-0">Ogni annuncio al quale ti candidi presenterà il prezzo al minuto, in modo che tu possa essere informato.</p>
                            </div>
                        </div>
                    </div><div class="accordion-item">
                        <h2 class="accordion-header" role="tab">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-1 .item-3" aria-expanded="false"
                                    aria-controls="accordion-1 .item-3">Cosa posso fare con un utente che si comporta male?
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-3" role="tabpanel" data-bs-parent="#accordion-1">
                            <div class="accordion-body">
                                <p class="mb-0">È sufficiente segnalare l’utente specificando le motivazioni, e gli amministratori si occuperanno della questione.</p>
                            </div>
                        </div>
                    </div><div class="accordion-item">
                        <h2 class="accordion-header" role="tab">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-1 .item-3" aria-expanded="false"
                                    aria-controls="accordion-1 .item-3">Quali lingue sono supportate sulla piattaforma?
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse item-3" role="tabpanel" data-bs-parent="#accordion-1">
                            <div class="accordion-body">
                                <p class="mb-0">Al momento Q4U supporta solo l’italiano.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>