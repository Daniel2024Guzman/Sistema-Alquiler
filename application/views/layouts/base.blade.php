<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Constructora | Guzman</title>
  <link rel="stylesheet" href="<?= base_url()?>assets/css/all.min.css" />
  <link rel="stylesheet" href="<?= base_url()?>assets/css/base.css" />
  @yield('css')
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
</head>

<body>
  <div class="page d-flex">
    <video autoplay loop muted width="320" height="240">
      <source src="<?= base_url()?>assets/img/base/7btrrd.mp4" type="video/mp4">
      Su navegador no soporta la etiqueta de vídeo.
    </video>
    <div class="sidebar bg-theme p-20 p-relative">
      <h3 class="p-relative txt-c mt-0">CONSTRUCTORA GUZMAN</h3>
      <ul>
        <li>
          <a class="{{ isset($current_segment) && $current_segment == 'Panel' ? 'active' : '' }} d-flex align-center fs-14 rad-6 p-10" href="<?= base_url('Panel') ?>">
            <i class="fa-regular fa-chart-bar fa-fw"></i>
            <span>Panel</span>
          </a>
        </li>
        
      </ul>
    </div>
    <div class="content w-full">
      <!-- Start Head -->
      <div class="head bg-theme p-15 between-flex">
        <div class="search p-relative">
          <input class="p-10" type="search" placeholder="Type A Keyword" />
        </div>
        <div class="icons d-flex align-center">
          <span class="notification p-relative">
            <i class="fa-regular fa-bell fa-lg"></i>
          </span>
          <img src="<?= base_url()?>assets/img/base/avatar.png" alt="" />
        </div>
      </div>
      <!-- End Head -->
      <h1 class="p-relative">@yield('titulo')</h1>
      @yield('contenido')
    </div>
  </div>
  @yield('js')
</body>

</html>