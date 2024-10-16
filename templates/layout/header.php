<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
          <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="<?php echo BASE_URL; ?>top-songs" class="nav-link px-2">GLOBAL TOP</a></li>
        <li><a href="<?php echo BASE_URL; ?>artists" class="nav-link px-2">artistas</a></li>
        <li><a href="<?php echo BASE_URL; ?>suggestions" class="nav-link px-2">Modificaciones</a></li>
        <li><a href="<?php echo BASE_URL; ?>about" class="nav-link px-2">Nosotros</a></li>
      </ul>

      <div class="user">
      <?php if($this->user) : ?>
        <span><?= $this->user->email ?></span>
        <?php endif; ?>
      </div>
      <div class="col-md-3 text-end">
        <a href="<?php echo BASE_URL; ?>showLogin" class="btn btn-outline-primary me-2">Login</a>
        <a href="<?php echo BASE_URL; ?>logOut" class="btn btn-outline-primary me-2">Sing-up</a>
      </div>
    </header>
  </div>
<body>
