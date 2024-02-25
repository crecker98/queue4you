<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Q4U</title>
    <link rel="stylesheet" href="<?= base_url("assets/bootstrap/css/bootstrap.min.css") ?>">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
    <link rel="stylesheet" href="<?= base_url("assets/css/Bootstrap-Payment-Form-.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/Profile-Card.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/Profile-Edit-Form-styles.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/Profile-Edit-Form.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/User-Payment-Overview-Rows---Panel-Container.css") ?>">
</head>

<body>
<nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3 navbar-light" id="mainNav">
    <div class="container"><a class="navbar-brand d-flex align-items-center"
                              href="<?= base_url() ?>"><span>Q4U</span></a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span
                    class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link active" href="<?= base_url() ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url("annunci") ?>">Annunci</a></li>
            </ul>
            <a class="btn btn-primary shadow" role="button" href="<?= base_url("signup") ?>">REGISTRATI</a>
            <div class="dropdown"><a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="#">Nome
                    Cognome&nbsp;</a>
                <div class="dropdown-menu"><a class="dropdown-item" href="<?= base_url("areaRiservata") ?>">Profilo</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>