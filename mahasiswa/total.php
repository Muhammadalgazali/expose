<?php
// Include the database connection file
require_once("conn.php");

// Fetch the total count of students from tb_mahasiswa
$result = mysqli_query($mysqli, "SELECT COUNT(*) AS total_mahasiswa FROM tb_mahasiswa");

// Check if query was successful
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalMahasiswa = $row['total_mahasiswa'];
} else {
    $totalMahasiswa = "Data tidak tersedia";
}
?>

<div class="col-lg-12 col-md-6 col-12 mb-4">
  <div class="card">
    <span class="mask bg-primary opacity-10 border-radius-lg"></span>
    <div class="card-body p-3 position-relative">
      <div class="row">
        <div class="col-8 text-start">
          <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
            <img class="Center mt-3 pb-1" src="assets/img/Icons/users.svg" alt="" height="25px">
          </div>
          <h5 class="text-white font-weight-bolder mb-0 mt-3">
            <?php echo $totalMahasiswa; ?>
          </h5>
          <span class="text-white text-sm">Total Mahasiswa</span>
        </div>
      </div>
    </div>
  </div>
</div>

            