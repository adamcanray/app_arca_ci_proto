<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS online -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap CSS offline -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">


    <!-- Jquery offline -->
    <!-- harus di head, karena jika dibody tidak berjalan -->
    <script src="<?= base_url(); ?>assets/js/jquery-3.4.1/jquery.slim.min.js"></script>
    <!-- Jquery online -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>

    <!-- jquery mask offline -->
    <script src="<?= base_url(); ?>assets/js/jquery-mask/jquery.mask.min.js"></script>
    <!-- Jquery mask Online -->
    <!-- <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script> -->
   
    <!-- boostrap.min.js offline -->
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

    <!-- title echo dari $data -->
    <title><?= $judul; ?></title>
</head>
<body>
<!-- Navbar Menu -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<!-- container -->
<div class="container">
  <a class="navbar-brand" href="<?= base_url(); ?>">PT. Arca International</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="<?= base_url(); ?>karyawan">Karyawan</a>
      <a class="nav-item nav-link" href="<?= base_url(); ?>about">About</a>
    </div>
  </div>
</div><!-- end container -->
</nav>