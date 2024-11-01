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
?>

<div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mahasiswa</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Peminatan</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Progress</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last Time</th>
                <th class="text-secondary opacity-7"></th>
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

                // Get the stage name based on lastProgressId
                $queryStageName = "SELECT nama_tahap FROM tb_tahapan WHERE id_t = $lastProgressId";
                $resultStageName = mysqli_query($mysqli, $queryStageName);
                $stageRow = mysqli_fetch_assoc($resultStageName);
                $stageName = $stageRow ? $stageRow['nama_tahap'] : "Unknown";

                // Determine the percentage and progress bar color
                $percentage = ($totalProgressSteps > 0) ? ($lastProgressId / 5) * 100 : 0; // Assuming there are 5 total steps
                if ($percentage <= 20) {
                    $colorClass = 'bg-gradient-dark';
                } elseif ($percentage <= 40) {
                    $colorClass = 'bg-gradient-danger';
                } elseif ($percentage <= 60) {
                    $colorClass = 'bg-gradient-warning';
                } elseif ($percentage <= 80) {
                    $colorClass = 'bg-gradient-success';
                } else {
                    $colorClass = 'bg-gradient-info';
                }

                // Determine the photo path
                $photoPath = file_exists("assets/img/mahasiswa/$nim.jpg") ? "assets/img/mahasiswa/$nim.jpg" : "assets/img/mahasiswa/default.jpg";
                ?>
                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div>
                                <img src="<?php echo $photoPath; ?>" class="avatar avatar-sm me-3" alt="<?php echo $nama; ?>">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm"><?php echo $nim; ?></h6>
                                <p class="text-xs text-secondary mb-0"><?php echo $nama; ?></p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $peminatan; ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="me-2 text-xs font-weight-bold"><?php echo number_format($percentage, 2); ?>%</span>
                            <div>
                                <div class="progress">
                                    <div class="progress-bar <?php echo $colorClass; ?>" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage; ?>%;"></div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle text-center">
                        <p class="text-xs text-secondary mb-0"><?php echo "Tahap ".$lastProgressId." : ". $stageName; ?></p>
                        <span class="text-secondary text-xs font-weight-bold"><?php echo date('d/m/Y', strtotime($lastProgressDate)); ?></span>
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
