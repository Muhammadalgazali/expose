<?php
// Include database connection file
require_once("conn.php");

// Ambil total mahasiswa
$queryTotalMahasiswa = "SELECT COUNT(DISTINCT id_m) AS total_mahasiswa FROM tb_mahasiswa";
$resultTotalMahasiswa = mysqli_query($mysqli, $queryTotalMahasiswa);
$totalMahasiswa = mysqli_fetch_assoc($resultTotalMahasiswa)['total_mahasiswa'];

// Ambil daftar tahapan
$queryTahapan = "SELECT id_t, nama_tahap FROM tb_tahapan ORDER BY id_t";
$resultTahapan = mysqli_query($mysqli, $queryTahapan);

$progressDataStages = [];

$logos = [
    1 => 'logo-spotify.svg',
    2 => 'logo-invision.svg',
    3 => 'logo-webdev.svg',
    4 => 'logo-jira.svg',
    5 => 'logo-slack.svg'
];

while ($tahapan = mysqli_fetch_assoc($resultTahapan)) {
    $idTahap = $tahapan['id_t'];
    $namaTahap = $tahapan['nama_tahap'];

    // Hitung mahasiswa yang hanya sampai tahap ini (tidak ada di tahap berikutnya)
    $queryLastStage = "
        SELECT COUNT(DISTINCT p.id_m) AS jumlah 
        FROM tb_progress p
        LEFT JOIN tb_progress p2 ON p.id_m = p2.id_m AND p2.id_t > $idTahap
        WHERE p.id_t = $idTahap AND p2.id_t IS NULL
    ";
    $resultLastStage = mysqli_query($mysqli, $queryLastStage);
    $jumlahMahasiswa = mysqli_fetch_assoc($resultLastStage)['jumlah'];

    // Hitung persentase
    $percentage = ($totalMahasiswa > 0) ? ($jumlahMahasiswa / $totalMahasiswa) * 100 : 0;
    // Determine progress bar color
  
    $colorClassCompleted =
        $percentage <= 20 ? 'bg-gradient-dark' :
        ($percentage <= 40 ? 'bg-gradient-danger' :
        ($percentage <= 60 ? 'bg-gradient-warning' :
        ($percentage <= 80 ? 'bg-gradient-success' : 'bg-gradient-info')));

    $progressDataStages[] = [
        'stageId' => $idTahap,
        'stageName' => $namaTahap,
        'count' => $jumlahMahasiswa,
        'percentage' => $percentage,
        'total' => $totalMahasiswa,
        'colorClassCompleted' => $colorClassCompleted,
        'logo' => htmlspecialchars($logos[$idTahap] ?? 'default-logo.svg', ENT_QUOTES, 'UTF-8')
    ];
}
?>

<div class="table-responsive p-0">
    <table class="table align-items-center justify-content-center mb-0">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahapan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Mahasiswa</th>
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
                        <span class="text-xs font-weight-bold"><?php echo $data['count']." dari ". $data['total'] ; ?></span>
                    </td>
                    <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="me-2 text-xs font-weight-bold"><?php echo number_format($data['percentage'], 2); ?>%</span>
                            <div>
                                <div class="progress">
                                    <div class="progress-bar <?php echo $data['colorClassCompleted']; ?>" role="progressbar" aria-valuenow="<?php echo $data['percentage']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $data['percentage']; ?>%;"></div>
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
