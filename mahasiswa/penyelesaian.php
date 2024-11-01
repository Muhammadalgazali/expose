<?php
// Include database connection file
require_once("conn.php");

// Get total number of students
$queryTotalMahasiswa = "SELECT COUNT(id_m) AS total_mahasiswa FROM tb_mahasiswa";
$resultTotalMahasiswa = mysqli_query($mysqli, $queryTotalMahasiswa);
$totalMahasiswa = mysqli_fetch_assoc($resultTotalMahasiswa)['total_mahasiswa'];

// Get all stages with their names from tb_tahapan
$queryTahapan = "SELECT id_t, nama_tahap FROM tb_tahapan";
$resultTahapan = mysqli_query($mysqli, $queryTahapan);
$stageNames = [];
while ($row = mysqli_fetch_assoc($resultTahapan)) {
    $stageNames[$row['id_t']] = $row['nama_tahap'];
}

// Define array to store progress data for each stage
$progressDataStages = [];

// Array of logos for each stage
$logos = [
    1 => 'logo-spotify.svg',
    2 => 'logo-invision.svg',
    3 => 'logo-webdev.svg',
    4 => 'logo-jira.svg',
    5 => 'logo-slack.svg'
];

// Loop through stages to calculate completion for each stage
foreach ($stageNames as $stageId => $stageName) {
    // Query to get students who have reached the current stage
    $queryReachedStage = "SELECT COUNT(DISTINCT id_m) AS count_reached FROM tb_progress WHERE id_t = $stageId";
    $resultReachedStage = mysqli_query($mysqli, $queryReachedStage);
    $countReachedStage = mysqli_fetch_assoc($resultReachedStage)['count_reached'];
    
    // Calculate students who have not reached the stage
    $countNotReachedStage = $totalMahasiswa - $countReachedStage;

    // Calculate percentages for both completed and not completed students
    $percentageCompleted = ($totalMahasiswa > 0) ? ($countReachedStage / $totalMahasiswa) * 100 : 0;
    $percentageNotCompleted = ($totalMahasiswa > 0) ? ($countNotReachedStage / $totalMahasiswa) * 100 : 0;

    // Determine progress bar color based on completed percentage
    if ($percentageCompleted <= 20) {
        $colorClassCompleted = 'bg-gradient-dark';
    } elseif ($percentageCompleted <= 40) {
        $colorClassCompleted = 'bg-gradient-danger';
    } elseif ($percentageCompleted <= 60) {
        $colorClassCompleted = 'bg-gradient-warning';
    } elseif ($percentageCompleted <= 80) {
        $colorClassCompleted = 'bg-gradient-success';
    } else {
        $colorClassCompleted = 'bg-gradient-info';
    }

    // Determine progress bar color based on not completed percentage
    if ($percentageNotCompleted <= 20) {
        $colorClassNotCompleted = 'bg-gradient-dark';
    } elseif ($percentageNotCompleted <= 40) {
        $colorClassNotCompleted = 'bg-gradient-danger';
    } elseif ($percentageNotCompleted <= 60) {
        $colorClassNotCompleted = 'bg-gradient-warning';
    } elseif ($percentageNotCompleted <= 80) {
        $colorClassNotCompleted = 'bg-gradient-success';
    } else {
        $colorClassNotCompleted = 'bg-gradient-info';
    }

    // Store data for each stage
    $progressDataStages[] = [
        'stageId' => $stageId,
        'stageName' => $stageName,
        'countReached' => $countReachedStage,
        'countNotReached' => $countNotReachedStage,
        'totalStage' => $totalMahasiswa,
        'percentageCompleted' => $percentageCompleted,
        'percentageNotCompleted' => $percentageNotCompleted,
        'colorClassCompleted' => $colorClassCompleted,
        'colorClassNotCompleted' => $colorClassNotCompleted,
        'logo' => $logos[$stageId] ?? 'default-logo.svg'
    ];
}
?>

<div class="table-responsive p-0">
    <table class="table align-items-center justify-content-center mb-0">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahapan</th>
                
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Mahasiswa Belum Selesai</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Persentase Belum Selesai</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Mahasiswa Selesai</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Persentase Selesai</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($progressDataStages as $data): ?>
                <tr>
                    <td>
                        <div class="d-flex px-2">
                            <div>
                                <img src="assets/img/small-logos/<?php echo $data['logo']; ?>" class="avatar avatar-sm rounded-circle me-2" alt="logo">
                            </div>
                            <div class="my-auto">
                                <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($data['stageName']); ?></h6>
                            </div>
                        </div>
                    </td>
                    
                    <td>
                        <span class="text-xs font-weight-bold"><?php echo $data['countNotReached']; ?> dari <?php echo $data['totalStage']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="me-2 text-xs font-weight-bold"><?php echo number_format($data['percentageNotCompleted'], 2); ?>%</span>
                            <div>
                                <div class="progress">
                                    <div class="progress-bar <?php echo $data['colorClassNotCompleted']; ?>" role="progressbar" aria-valuenow="<?php echo $data['percentageNotCompleted']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $data['percentageNotCompleted']; ?>%;"></div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold"><?php echo $data['countReached']; ?> dari <?php echo $data['totalStage']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="me-2 text-xs font-weight-bold"><?php echo number_format($data['percentageCompleted'], 2); ?>%</span>
                            <div>
                                <div class="progress">
                                    <div class="progress-bar <?php echo $data['colorClassCompleted']; ?>" role="progressbar" aria-valuenow="<?php echo $data['percentageCompleted']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $data['percentageCompleted']; ?>%;"></div>
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
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
