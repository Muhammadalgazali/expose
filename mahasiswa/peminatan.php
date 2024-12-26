<?php
// Include the database connection file
require_once("conn.php");

// Query to get total students per peminatan
$queryTotalMahasiswaPerPeminatan = "SELECT peminatan, COUNT(*) AS total_mahasiswa FROM tb_mahasiswa GROUP BY peminatan";
$resultTotalMahasiswaPerPeminatan = mysqli_query($mysqli, $queryTotalMahasiswaPerPeminatan);

// Prepare an array to store the percentage data
$progressData = [];

// Loop through each peminatan and calculate the percentage who reached phase 5
while ($row = mysqli_fetch_assoc($resultTotalMahasiswaPerPeminatan)) {
    $peminatan = $row['peminatan'];
    $totalMahasiswa = $row['total_mahasiswa'];

    // Query to get the number of students per peminatan who reached phase 5
    $queryReachedTahap5 = "SELECT COUNT(DISTINCT tb_progress.id_m) AS count_tahap5 
                            FROM tb_progress 
                            JOIN tb_mahasiswa ON tb_progress.id_m = tb_mahasiswa.id_m 
                            WHERE tb_mahasiswa.peminatan = '$peminatan' AND tb_progress.id_t = 5";
    $resultReachedTahap5 = mysqli_query($mysqli, $queryReachedTahap5);
    $countTahap5 = mysqli_fetch_assoc($resultReachedTahap5)['count_tahap5'];
    
    // Calculate the percentage
    $percentage = ($totalMahasiswa > 0) ? ($countTahap5 / $totalMahasiswa) * 100 : 0;

    // Determine the progress bar color
    if ($percentage <= 99) {
        $colorClass = 'bg-gradient-dark';
    } else {
        $colorClass = 'bg-gradient-info';
    }

    // Store the data
    $progressData[] = [
        'peminatan' => $peminatan,
        'countTahap5' => $countTahap5,
        'totalMahasiswa' => $totalMahasiswa,
        'percentage' => $percentage,
        'colorClass' => $colorClass
    ];
}
?>

<!-- HTML to display the progress bars -->
<div class="card-body pb-0 p-3">
    <ul class="list-group">
        <?php foreach ($progressData as $data): ?>
            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-0">
                <div class="w-100">
                    <div class="d-flex mb-2">
                        <span class="me-2 text-sm font-weight-bold text-dark">
                            <?php echo $data['peminatan']; ?>
                        </span>
                        <span class="ms-auto text-sm font-weight-bold d-flex align-items-center justify-content-between" style="width: 170px;">
                            <?php 
                                echo $data['countTahap5']; 
                            ?> 
                            dari 
                            <?php 
                                echo $data['totalMahasiswa']; 
                            ?> 
                            <span class="ms-1"> :  <?php echo number_format($data['percentage'], 2); ?>%</span>
                        </span>
                    </div>
                    <div>
                        <div class="progress progress-md">
                            <div class="progress-bar <?php echo $data['colorClass']; ?>" role="progressbar" style="width: <?php echo $data['percentage']; ?>%;" aria-valuenow="<?php echo $data['percentage']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
