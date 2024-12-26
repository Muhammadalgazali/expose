<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Soft UI Dashboard 3 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="assets/css/inter-font.css">
  <!-- Nucleo Icons -->
  <link rel="stylesheet" href="assets/css/nucleo-icons.css">
  <link rel="stylesheet" href="assets/css/nucleo-svg.css">
  <!-- Font Awesome Icons -->
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" target="_blank">
        <img src="assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Portal EXPOSE</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link  " href="index.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="assets/img/Icons/home.svg" alt="" width="12px" height="12px" viewBox="0 0 45 40">
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  active" href="mahasiswa.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="assets/img/Icons/users.png" alt="" width="12px" height="12px" viewBox="0 0 45 40">
            </div>
            <span class="nav-link-text ms-1">Mahasiswa</span>
          </a>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link " href="profile.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="assets/img/Icons/info.svg" alt="" width="12px" height="12px" viewBox="0 0 45 40">
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li> -->

      </ul>
    </div>

  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Mahasiswa</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Mahasiswa (Needs a lot of data)</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-3 col-12">
<!-- mahasiswa angka dan  nama -->
<div class="row">
  <?php
  include 'mahasiswa/total.php';
  include 'mahasiswa/skripsi.php';
  ?>
</div>
        </div>
        <div class="col-lg-9 col-12 mt-4 mt-lg-0">
          <div class="card shadow h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Specializations</h6>
            </div>
            <?php
            include 'mahasiswa/peminatan.php';
            ?>
            <div class="card-footer pt-0 p-3 d-flex align-items-center">
              <div class="w-60">
                <p class="text-sm">
                  Let's achieve <b>100%</b> completion for all these <b>specializations</b>  without anyone being dropped from the program. 
                </p>
              </div>
              <div class="w-40 text-end">
                <a class="btn btn-dark mb-0 text-end" href="javascript:;" onclick="scrollToTable()">View all reviews</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mt-4">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Mahasiswa</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <!-- Mahasiswa.php -->
              <?php
            include 'mahasiswa/mahasiswa.php';
            ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0" id="projectzTable">
              <h6>Completion Status</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <!-- Penyelesaian.php -->
              <?php
            include 'mahasiswa/penyelesaian.php';
            ?>

            </div>
          </div>
        </div>
      </div>

    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>

function scrollToTable() {
    const tableElement = document.getElementById('projectzTable');
    tableElement.scrollIntoView({
        behavior: 'smooth',  // Membuat scroll menjadi halus
        block: 'start'       // Memposisikan elemen di bagian atas viewport
    });
}


    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    
  </script>
  <!-- Github buttons -->

  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
</body>

</html>