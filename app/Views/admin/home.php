<header class="pt-5"></header>
<section>
    <div class="container py-4 py-xl-5" style="margin-top: 100px;">
        <div class="row gy-5 row-cols-1 row-cols-sm-2" style="padding: 25px;">
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
                    <h5 class="fw-bold mb-0 ms-2">Utenti registrati</h5>
                </div>
                <p class="text-muted my-3"><?=$utenti?></p>
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
                    <h5 class="fw-bold mb-0 ms-2"><strong>Attività in corso nel giorno</strong></h5>
                </div>
                <p class="text-muted my-3"><?=$attivitaInCorso?></p>
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
                    <h5 class="fw-bold mb-0 ms-2"><strong>Numero attività completate</strong></h5>
                </div>
                <p class="text-muted my-3"><?=$attivitaCompletate?></p>
            </div>
            <div class="col text-center text-md-start" style="text-align: center;">
                <div class="d-flex justify-content-center align-items-center justify-content-md-start">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"
                         class="icon icon-tabler icon-tabler-sun fs-3 text-primary bg-secondary">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                        <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                    </svg>
                    <h5 class="fw-bold mb-0 ms-2"><strong>Segnalazioni aperte</strong></h5>
                </div>
                <p class="text-muted my-3"><?=$segnalazioniAperte?></p>
            </div>
        </div>
    </div>
</section>