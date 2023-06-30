<!-- <h1>Selamat datang di Todo App</h1>
<a href="<?php echo base_url('dashboard'); ?>">Go to Dashboard</a> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Todo APP - Tubes Thoriq Dharmawan</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets') ?>/assets/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Simple line icons-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css"
    rel="stylesheet" />
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic"
    rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="<?= base_url('assets') ?>/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
  <!-- Header-->
  <header class="masthead d-flex align-items-center">
    <div class="container px-4 px-lg-5 text-center">
      <h1 class="mb-1">Todo APP</h1>
      <h3 class="mb-5"><em>Aplikasi Keren Untuk Mencatat Kegiatan Kamu</em></h3>
      <?php if (empty($user_id)): ?>
        <a class="btn btn-primary btn-xl" href="<?php echo base_url('auth/login'); ?>">Masuk</a>
      <?php else: ?>
        <a class="btn btn-primary btn-xl" href="<?php echo base_url('dashboard'); ?>">Ke Dashboard</a>
      <?php endif ?>
    </div>
  </header>
  <!-- About-->
  <section class="content-section bg-light" id="about">
    <div class="container px-4 px-lg-5 text-center">
      <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-lg-10">
          <h2>Raih produktivitas maksimal dengan aplikasi todo app kami!</h2>
          <p class="lead mb-5">
            Pengelolaan mudah, tugas-tugas selesai tepat waktu!
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- Services-->
  <section class="content-section bg-primary text-white text-center" id="services">
    <div class="container px-4 px-lg-5">
      <div class="content-section-heading">
        <h3 class="text-secondary mb-0">Layanan</h3>
        <h2 class="mb-5">Apa Yang Kami Tawarkan</h2>
      </div>
      <div class="row gx-4 gx-lg-5">
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
          <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-screen-smartphone"></i></span>
          <h4><strong>Prioritaskan dan Atur Jadwal dengan Mudah</strong></h4>
          <p class="text-faded mb-0">Dengan aplikasi todo app kami, kamu dapat dengan cepat memprioritaskan
            tugas-tugasmu dan membuat jadwal yang teratur</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
          <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-pencil"></i></span>
          <h4><strong>Manajemen Tugas yang Efisien</strong></h4>
          <p class="text-faded mb-0">Aplikasi todo app kami memberikan kemudahan dalam mengatur dan mengelola
            tugas-tugas harianmu</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
          <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-like"></i></span>
          <h4><strong>Keamanan dan Privasi</strong></h4>
          <p class="text-faded mb-0">
            Kami mengutamakan keamanan dan privasi data pengguna
          </p>
        </div>
        <div class="col-lg-3 col-md-6">
          <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-mustache"></i></span>
          <h4><strong>Tracking dan Progres Tugas</strong></h4>
          <p class="text-faded mb-0">kamu dapat melihat sejauh mana tugas-tugasmu telah diselesaikan</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Callout-->
  <section class="callout">
    <div class="container px-4 px-lg-5 text-center">
      <h2 class="mx-auto mb-5">
        Jangan biarkan pekerjaan menumpuk!
      </h2>
      <a class="btn btn-primary btn-xl" href="<?php echo base_url('auth/login'); ?>">Masuk</a>
    </div>
  </section>


  <!-- Footer-->
  <footer class="footer text-center">
    <div class="container px-4 px-lg-5">
      <p class="text-muted small mb-0">Copyright &copy; Throiq Dharmawan 2023</p>
    </div>
  </footer>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="<?= base_url('assets') ?>/js/scripts.js"></script>
</body>

</html>