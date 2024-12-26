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
          <a class="nav-link  active" href="dashboard.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="assets/img/Icons/home.png" alt="" width="12px" height="12px" viewBox="0 0 45 40">
              

              
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="mahasiswa.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <img src="assets/img/Icons/users.svg" alt="" width="12px" height="12px" viewBox="0 0 45 40">
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard  (No Database Needed)</h6>
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
    <div class="container-fluid py-4">

      <div class="row mt-0">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-bold">Progres Mahasiswa</p>
                    <h5 class="font-weight-bolder">EXPOSE 2019</h5>
                    <p class="mb-5">Aplikasi dummy penerapan PHP dan Database</p>
                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="mahasiswa.php">
                      Read More
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-primary border-radius-lg h-100">
                    
                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                      <img class="w-100 position-relative z-index-2 pt-4" src="assets/img/illustrations/rocket-white.png" alt="rocket">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card h-100 p-3">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('assets/img/ivancik.jpg');">
              <span class="mask bg-gradient-dark"></span>
              <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                <h5 class="text-white font-weight-bolder mb-4">SERVER 1</h5>
                <p class="text-white">Analisis Performansi Load Balancing Weighted Least Connection Menggunakan Haproxy Terhadap Peningkatan Kinerja Web Server</p>
                <a onclick="submitForm('E1E119032')" class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:void(0);">
                  Muhammad Algazali
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>

                    <script>
                    function submitForm(nim) {
                        var form = document.createElement('form');
                        form.method = 'POST';
                        form.action = 'profile.php';
                        var hiddenField = document.createElement('input');
                        hiddenField.type = 'hidden';
                        hiddenField.name = 'nim';
                        hiddenField.value = nim;
                        form.appendChild(hiddenField);
                        document.body.appendChild(form);
                        form.submit();
                    }
                    </script>


              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-5 mb-lg-0 mb-4">
          <div class="card z-index-2">
            <div class="card-body p-2">
              <div class="bg-dark border-radius-md py-3 pe-1 mb-3">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="144"></canvas>
                </div>
              </div>
              <h6 class="ms-2 mt-4 mb-0"> Mahasiswa Tersisa</h6>
              <p class="text-sm ms-2"> (<span class="font-weight-bolder">30%</span>) from all of us </p>
              <div class="container border-radius-lg">
                <div class="row">
                  <div class="col-3 py-3 ps-0">
                    <div class="d-flex mb-2">
                      <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-primary text-center me-2 d-flex align-items-center justify-content-center">
                        
                          <img src="assets/img/Icons/users.png" alt="" width="15px" height="15px" viewBox="0 0 100 100">
                          
                      </div>
                      <p class="text-xs mt-1 mb-0 font-weight-bold">People</p>
                    </div>
                    <h4 class="font-weight-bolder">79</h4>
                    <div class="progress w-75">
                      <div class="progress-bar bg-dark w-90" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-3 py-3 ps-0">
                    <div class="d-flex mb-2">
                      <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-info text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="assets/img/Icons/troph.png" alt="" width="15px" height="15px" viewBox="0 0 100 100">
                      </div>
                      <p class="text-xs mt-1 mb-0 font-weight-bold">Tittle</p>
                    </div>
                    <h4 class="font-weight-bolder">S.T.</h4>
                    <div class="progress w-75">
                      <div class="progress-bar bg-dark w-90" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-3 py-3 ps-0">
                    <div class="d-flex mb-2">
                      <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-warning text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="assets/img/Icons/cost.png" alt="" width="15px" height="15px" viewBox="0 0 100 100">
                      </div>
                      <p class="text-xs mt-1 mb-0 font-weight-bold">All Cost</p>
                    </div>
                    <h4 class="font-weight-bolder">2200$</h4>
                    <div class="progress w-75">
                      <div class="progress-bar bg-dark w-90" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-3 py-3 ps-0">
                    <div class="d-flex mb-2">
                      <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-danger text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="assets/img/Icons/steps.png" alt="" width="15px" height="15px" viewBox="0 0 100 100">
                      </div>
                      <p class="text-xs mt-1 mb-0 font-weight-bold">Steps</p>
                    </div>
                    <h4 class="font-weight-bolder">7</h4>
                    <div class="progress w-75">
                      <div class="progress-bar bg-dark w-100" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          

          
          <div class="card z-index-2">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header pb-0">
                    <h6>Progress Table</h6>
                  </div>
                  <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                      <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Project</th>
                            <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Service Cost</th> -->
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Step</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Completion Phase</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="d-flex px-2">
                                <div>
                                  <img src="assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                </div>
                                <div class="my-auto">
                                  <h6 class="mb-0 text-sm">Pengajuan Judul</h6>
                                </div>
                              </div>
                            </td>
                            <!-- <td>
                              <p class="text-sm font-weight-bold mb-0">$300</p>
                            </td> -->
                            <td>
                              <span class="text-xs font-weight-bold">BAB 1</span>
                            </td>
                            <td class="align-middle text-center">
                              <div class="d-flex align-items-center justify-content-center">
                                <span class="me-2 text-xs font-weight-bold">0-13%</span>
                                <div>
                                  <div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar" aria-valuenow="13" aria-valuemin="0" aria-valuemax="100" style="width: 13%;"></div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="align-middle">
                              <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-xs"></i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex px-2">
                                <div>
                                  <img src="assets/img/small-logos/logo-invision.svg" class="avatar avatar-sm rounded-circle me-2" alt="invision">
                                </div>
                                <div class="my-auto">
                                  <h6 class="mb-0 text-sm">Pengajuan Proposal</h6>
                                </div>
                              </div>
                            </td>
                            <!-- <td>
                              <p class="text-sm font-weight-bold mb-0">$400</p>
                            </td> -->
                            <td>
                              <span class="text-xs font-weight-bold">BAB 2 & 3</span>
                            </td>
                            <td class="align-middle text-center">
                              <div class="d-flex align-items-center justify-content-center">
                                <span class="me-2 text-xs font-weight-bold">14-42%</span>
                                <div>
                                  <div class="progress">
                                    <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 42%;"></div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="align-middle">
                              <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-xs"></i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex px-2">
                                <div>
                                  <img src="assets/img/small-logos/logo-webdev.svg" class="avatar avatar-sm rounded-circle me-2" alt="slack">
                                </div>
                                <div class="my-auto">
                                  <h6 class="mb-0 text-sm">Pengajuan Hasil</h6>
                                </div>
                              </div>
                            </td>
                            <!-- <td>
                              <p class="text-sm font-weight-bold mb-0">$500</p>
                            </td> -->
                            <td>
                              <span class="text-xs font-weight-bold">BAB 4</span>
                            </td>
                            <td class="align-middle text-center">
                              <div class="d-flex align-items-center justify-content-center">
                                <span class="me-2 text-xs font-weight-bold">43-55%</span>
                                <div>
                                  <div class="progress">
                                    <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0" style="width: 55%;"></div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="align-middle">
                              <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-xs"></i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex px-2">
                                <div>
                                  <img src="assets/img/small-logos/logo-jira.svg" class="avatar avatar-sm rounded-circle me-2" alt="jira">
                                </div>
                                <div class="my-auto">
                                  <h6 class="mb-0 text-sm">Pengajuan Skripsi</h6>
                                </div>
                              </div>
                            </td>
                            <!-- <td>
                              <p class="text-sm font-weight-bold mb-0">$600</p>
                            </td> -->
                            <td>
                              <span class="text-xs font-weight-bold">BAB 5</span>
                            </td>
                            <td class="align-middle text-center">
                              <div class="d-flex align-items-center justify-content-center">
                                <span class="me-2 text-xs font-weight-bold">56-85%</span>
                                <div>
                                  <div class="progress">
                                    <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="30" style="width: 85%;"></div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="align-middle">
                              <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-xs"></i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex px-2">
                                <div>
                                  <img src="assets/img/small-logos/logo-slack.svg" class="avatar avatar-sm rounded-circle me-2" alt="slack">
                                </div>
                                <div class="my-auto">
                                  <h6 class="mb-0 text-sm">Yudisium
                                  </h6>
                                </div>
                              </div>
                            </td>
                            <!-- <td>
                              <p class="text-sm font-weight-bold mb-0">$700</p>
                            </td> -->
                            <td>
                              <span class="text-xs font-weight-bold">BAB 6 - Finish</span>
                            </td>
                            <td class="align-middle text-center">
                              <div class="d-flex align-items-center justify-content-center">
                                <span class="me-2 text-xs font-weight-bold">86-100%</span>
                                <div>
                                  <div class="progress">
                                    <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0" style="width: 100%;"></div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="align-middle">
                              <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v text-xs"></i>
                              </button>
                            </td>
                          </tr>
      
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
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
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Inter",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Inter",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Inter",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
</body>

</html>