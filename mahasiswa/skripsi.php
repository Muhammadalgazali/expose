<?php
// Include the database connection file
require_once("conn.php");

// Query to get the number of students who reached tahap 5
$queryTahap5 = "SELECT COUNT(DISTINCT id_m) AS count_tahap5 FROM tb_progress WHERE id_t = 5";
$resultTahap5 = mysqli_query($mysqli, $queryTahap5);

// Query to get the total number of students
$queryTotalMahasiswa = "SELECT COUNT(*) AS total_mahasiswa FROM tb_mahasiswa";
$resultTotalMahasiswa = mysqli_query($mysqli, $queryTotalMahasiswa);

// Fetch the results
if ($resultTahap5 && $resultTotalMahasiswa) {
    $countTahap5 = mysqli_fetch_assoc($resultTahap5)['count_tahap5'];
    $totalMahasiswa = mysqli_fetch_assoc($resultTotalMahasiswa)['total_mahasiswa'];
    
    // Calculate the percentage
    $percentage = ($totalMahasiswa > 0) ? ($countTahap5 / $totalMahasiswa) * 100 : 0;
} else {
    $countTahap5 = "Data tidak tersedia";
    $totalMahasiswa = "Data tidak tersedia";
    $percentage = "Data tidak tersedia";
}
?>

<div class="col-lg-12 col-md-6 col-12 mt-4 mt-md-0">
  <div class="card">
    <span class="mask bg-info opacity-10 border-radius-lg"></span>
    <div class="card-body p-3 position-relative">
      <div class="row">
        <div class="col-8 text-start">
          <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
            <img class="Center mt-3 pb-1" src="assets/img/Icons/troph-b.png" alt="" height="25px">
          </div>
          <h5 class="text-white font-weight-bolder mb-0 mt-3">
            <?php echo $countTahap5; ?>
          </h5>
          <span class="text-white text-sm">Finished Skripsi</span>
        </div>
        <div class="col-4">
          <div class="dropstart text-end mb-6"></div>
          <p class="text-white text-sm text-end font-weight-bolder mt-auto mb-0">
            <?php echo number_format($percentage, 2); ?>%
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
