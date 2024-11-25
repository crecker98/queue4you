
CREATE TABLE IF NOT EXISTS public.localita
(
    codice      SERIAL,
    descrizione character varying(100) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT localita_pkey PRIMARY KEY (codice)
    );
CREATE TABLE IF NOT EXISTS public.utenti
(
    codicefiscale      character(16) COLLATE pg_catalog."default"          NOT NULL,
    nome               character varying(50) COLLATE pg_catalog."default"  NOT NULL,
    cognome            character varying(50) COLLATE pg_catalog."default"  NOT NULL,
    wallet             numeric(10, 2)                                      NOT NULL DEFAULT 0,
    email              character varying(100) COLLATE pg_catalog."default" NOT NULL,
    password           character varying(100) COLLATE pg_catalog."default" NOT NULL,
    telefono           character(10) COLLATE pg_catalog."default"          NOT NULL,
    localitacompetenza integer                                             NOT NULL,
    stato              integer                                             NOT NULL DEFAULT 1,
    foto               character varying(100) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT utenti_pkey PRIMARY KEY (codicefiscale),
    CONSTRAINT utenti_email_key UNIQUE (email),
    CONSTRAINT utenti_localitacompetenza_fkey FOREIGN KEY (localitacompetenza)
    REFERENCES public.localita (codice) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    );
CREATE TABLE IF NOT EXISTS public.annunci
(
    codice                      SERIAL,
    utentecommissionante        character varying(16) COLLATE pg_catalog."default"  NOT NULL,
    dataorainizionecessita      timestamp without time zone NOT NULL,
    dataoramassimacompletamento timestamp without time zone NOT NULL,
    descrizione                 text COLLATE pg_catalog."default"                   NOT NULL,
    oggetto                     character varying(255) COLLATE pg_catalog."default" NOT NULL,
    localita                    integer                                             NOT NULL,
    indirizzo                   character varying(255) COLLATE pg_catalog."default" NOT NULL,
    prezzominuto                numeric(10, 2)                                      NOT NULL,
    CONSTRAINT annuncio_pkey PRIMARY KEY (codice),
    CONSTRAINT fk_localita FOREIGN KEY (localita)
    REFERENCES public.localita (codice) MATCH SIMPLE
                                          ON UPDATE NO ACTION
                                          ON DELETE NO ACTION,
    CONSTRAINT fk_utente_commissionante FOREIGN KEY (utentecommissionante)
    REFERENCES public.utenti (codicefiscale) MATCH SIMPLE
                                          ON UPDATE NO ACTION
                                          ON DELETE NO ACTION
    );

CREATE TABLE IF NOT EXISTS public.candidature
(
    codice      SERIAL,
    annuncio               integer                                            NOT NULL,
    utentecommissionatario character varying(16) COLLATE pg_catalog."default" NOT NULL,
    orainizioattivita      timestamp without time zone,
    orafineattivita        timestamp without time zone,
    stato                  integer                                            NOT NULL,
    CONSTRAINT candidature_pkey PRIMARY KEY (codice),
    CONSTRAINT candidature_annuncio_fkey FOREIGN KEY (annuncio)
    REFERENCES public.annunci (codice) MATCH SIMPLE
                                     ON UPDATE NO ACTION
                                     ON DELETE NO ACTION,
    CONSTRAINT candidature_utentecommissionatario_fkey FOREIGN KEY (utentecommissionatario)
    REFERENCES public.utenti (codicefiscale) MATCH SIMPLE
                                     ON UPDATE NO ACTION
                                     ON DELETE NO ACTION,
    CONSTRAINT fk_annuncio FOREIGN KEY (annuncio)
    REFERENCES public.annunci (codice) MATCH SIMPLE
                                     ON UPDATE NO ACTION
                                     ON DELETE NO ACTION,
    CONSTRAINT fk_utente_commissionatario FOREIGN KEY (utentecommissionatario)
    REFERENCES public.utenti (codicefiscale) MATCH SIMPLE
                                     ON UPDATE NO ACTION
                                     ON DELETE NO ACTION
    );



CREATE TABLE IF NOT EXISTS public.pagamenti
(
    codice        SERIAL,
    annuncio      integer        NOT NULL,
    importo       numeric(10, 2) NOT NULL,
    datapagamento date           NOT NULL,
    CONSTRAINT pagamenti_pkey PRIMARY KEY (codice),
    CONSTRAINT fk_annuncio FOREIGN KEY (annuncio)
    REFERENCES public.annunci (codice) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION,
    CONSTRAINT pagamenti_annuncio_fkey FOREIGN KEY (annuncio)
    REFERENCES public.annunci (codice) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    );

CREATE TABLE IF NOT EXISTS public.preferiti
(
    codice          SERIAL,
    utentepreferente character varying(16) COLLATE pg_catalog."default" NOT NULL,
    utentepreferito  character varying(16) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT preferiti_pkey PRIMARY KEY (codice),
    CONSTRAINT preferiti_utentepreferente_fkey FOREIGN KEY (utentepreferente)
    REFERENCES public.utenti (codicefiscale) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION,
    CONSTRAINT preferiti_utentepreferito_fkey FOREIGN KEY (utentepreferito)
    REFERENCES public.utenti (codicefiscale) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    );

CREATE TABLE IF NOT EXISTS public.recensioni
(
    codice      SERIAL,
    utenterecensito  character varying(16) COLLATE pg_catalog."default" NOT NULL,
    utenterecensente character varying(16) COLLATE pg_catalog."default" NOT NULL,
    valutazione      integer                                            NOT NULL,
    commento         text COLLATE pg_catalog."default"                  NOT NULL,
    data             timestamp without time zone NOT NULL,
    annuncio         integer                                            NOT NULL,
    CONSTRAINT recensioni_pkey PRIMARY KEY (codice),
    CONSTRAINT recensioni_annuncio_fkey FOREIGN KEY (annuncio)
    REFERENCES public.annunci (codice) MATCH SIMPLE
                               ON UPDATE NO ACTION
                               ON DELETE NO ACTION,
    CONSTRAINT recensioni_utenterecensente_fkey FOREIGN KEY (utenterecensente)
    REFERENCES public.utenti (codicefiscale) MATCH SIMPLE
                               ON UPDATE NO ACTION
                               ON DELETE NO ACTION,
    CONSTRAINT recensioni_utenterecensito_fkey FOREIGN KEY (utenterecensito)
    REFERENCES public.utenti (codicefiscale) MATCH SIMPLE
                               ON UPDATE NO ACTION
                               ON DELETE NO ACTION,
    CONSTRAINT recensioni_valutazione_check CHECK (valutazione >= 1 AND valutazione <= 5)
    );

CREATE TABLE IF NOT EXISTS public.segnalazioni
(
    codice      SERIAL,
    utentechesegnala character varying(16) COLLATE pg_catalog."default" NOT NULL,
    utentesegnalato  character varying(16) COLLATE pg_catalog."default" NOT NULL,
    messaggio        text COLLATE pg_catalog."default"                  NOT NULL,
    data             timestamp without time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
    annuncio         integer                                            NOT NULL,
    CONSTRAINT segnalazioni_pkey PRIMARY KEY (codice),
    CONSTRAINT segnalazioni_annuncio_fkey FOREIGN KEY (annuncio)
    REFERENCES public.annunci (codice) MATCH SIMPLE
                               ON UPDATE NO ACTION
                               ON DELETE NO ACTION,
    CONSTRAINT segnalazioni_utentechesegnala_fkey FOREIGN KEY (utentechesegnala)
    REFERENCES public.utenti (codicefiscale) MATCH SIMPLE
                               ON UPDATE NO ACTION
                               ON DELETE NO ACTION,
    CONSTRAINT segnalazioni_utentesegnalato_fkey FOREIGN KEY (utentesegnalato)
    REFERENCES public.utenti (codicefiscale) MATCH SIMPLE
                               ON UPDATE NO ACTION
                               ON DELETE NO ACTION
    );