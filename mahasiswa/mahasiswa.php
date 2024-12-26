<?php
// Include the database connection file
require_once("conn.php");

// Query to get student data along with maximum progress
$queryStudents = "SELECT 
                    m.id_m, m.nim, m.nama_mahasiswa AS nama, m.peminatan, 
                    MAX(p.id_t) AS last_progress_id, 
                    MAX(p.tanggal) AS last_progress_date, 
                    COUNT(p.id_t) AS total_progress_steps
                  FROM 
                    tb_mahasiswa m 
                  LEFT JOIN 
                    tb_progress p ON m.id_m = p.id_m 
                  GROUP BY 
                    m.id_m 
                  ORDER BY 
                    m.nim";

$resultStudents = mysqli_query($mysqli, $queryStudents);

// Check if the query executed successfully
if (!$resultStudents) {
    die("Query failed: " . mysqli_error($mysqli));
}
?>

<div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mahasiswa</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Peminatan</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Progress</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahapan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Details</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($resultStudents)): ?>
                <?php
                // Retrieve student details
                $nim = strtoupper($row['nim']);
                $nama = $row['nama'];
                $peminatan = $row['peminatan'];
                $lastProgressId = $row['last_progress_id'];
                $lastProgressDate = $row['last_progress_date'];
                $totalProgressSteps = $row['total_progress_steps'];

                // Cek apakah $lastProgressId ada dan valid
                if (!empty($lastProgressId)) {
                    // Menggunakan prepared statement untuk menghindari error SQL
                    $queryStageName = "SELECT nama_tahap FROM tb_tahapan WHERE id_t = ?";
                    if ($stmt = mysqli_prepare($mysqli, $queryStageName)) {
                        // Bind parameter dan eksekusi query
                        mysqli_stmt_bind_param($stmt, "i", $lastProgressId); // "i" berarti integer
                        mysqli_stmt_execute($stmt);
                        $resultStageName = mysqli_stmt_get_result($stmt);

                        // Ambil nama tahapan
                        $stageRow = mysqli_fetch_assoc($resultStageName);
                        $stageName = $stageRow ? $stageRow['nama_tahap'] : "Unknown";
                    } else {
                        $stageName = "Unknown"; // Jika terjadi kesalahan saat menyiapkan query
                    }
                } else {
                    $stageName = "Unknown"; // Jika lastProgressId tidak ada atau invalid
                }

                // Tentukan persentase dan warna progress bar
                $percentage = ($totalProgressSteps > 0) ? ($lastProgressId / 5) * 100 : 0; // Asumsi ada 5 langkah total
                if ($percentage <= 20) {
                    $colorClass = 'bg-dark';
                } elseif ($percentage <= 40) {
                    $colorClass = 'bg-danger';
                } elseif ($percentage <= 60) {
                    $colorClass = 'bg-warning';
                } elseif ($percentage <= 80) {
                    $colorClass = 'bg-info';
                } else {
                    $colorClass = 'bg-success';
                }

                // Tentukan path gambar mahasiswa
                $photoPath = file_exists("assets/img/mahasiswa/$nim.jpg") ? "assets/img/mahasiswa/$nim.jpg" : "assets/img/mahasiswa/default.jpg";
                ?>

                <tr>
                    <td>
                        <div class="p-2 d-flex py-1">
                            <div>
                                <img src="<?php echo $photoPath; ?>" class="avatar avatar-sm me-3" alt="<?php echo $nama; ?>">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm"><?php echo $nim; ?> </h6>
                                <p class="text-xs text-secondary mb-0"><?php echo $nama; ?></p>
                            </div>
                        </div>
                    </td>

                    <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $peminatan; ?></p>
                    </td>
                    
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs text-secondary"><?php echo number_format($percentage); ?>%</p>
                        <div class="align-middle progress-bar <?php echo $colorClass; ?>" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage; ?>%;"></div>
                    </td>

                    <td class="align-middle text-center">
                        <p class="text-xs text-secondary mb-0"><?php echo $stageName; ?></p>
                        <span class="text-secondary text-xs font-weight-bold"><?php echo "T." . $lastProgressId . " : " . date('d/m/Y', strtotime($lastProgressDate)); ?></span>
                    </td>

                    <td class="align-middle">
                        <a href="javascript:void(0);" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" onclick="submitForm('<?php echo htmlspecialchars($nim); ?>')">
                            Details
                        </a>
                    </td>

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
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
