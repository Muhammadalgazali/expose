<?php
// Query untuk mendapatkan tahapan dan progress mahasiswa
$queryProgress = "
    SELECT p.tanggal, p.id_t
    FROM tb_progress p
    WHERE p.id_m = ?
    ORDER BY p.tanggal ASC"; // Mengurutkan berdasarkan tanggal
$stmtProgress = $mysqli->prepare($queryProgress);

if ($stmtProgress) {
    $stmtProgress->bind_param('i', $idMahasiswa); // Menggunakan id mahasiswa yang sudah ada
    $stmtProgress->execute();
    $resultProgress = $stmtProgress->get_result();
} else {
    error_log("Failed to prepare progress query: " . $mysqli->error);
}

// Pemetaan ID tahapan berdasarkan id_t
$namaTahapMap = [
    1 => "Program Tugas Akhir",
    2 => "Judul Disetujui",
    3 => "Seminar Proposal",
    4 => "Seminar Hasil",
    5 => "Seminar Skripsi"
];
?>

<div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
            <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 w-1">No.</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Tahapan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultProgress->num_rows > 0) {
                while ($progress = $resultProgress->fetch_assoc()) {
                    // Memetakan id_t ke nama tahapan
                    $namaTahap = isset($namaTahapMap[$progress['id_t']]) ? $namaTahapMap[$progress['id_t']] : "Tahap Tidak Diketahui";
                    echo "
                    <tr>
                        <td>
                            <p style='margin-left: 20%;' class='p-2 text-xs font-weight-bold mb-0'>" . htmlspecialchars($progress['id_t']) . "</p>
                        </td>
                        <td>
                            <p class=' p-2 text-xs font-weight-bold mb-0'>" . htmlspecialchars($namaTahap) . "</p>
                        </td>
                        <td>
                            <p class='text-xs font-weight-bold mb-0'>" . htmlspecialchars($progress['tanggal']) . "</p>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No progress data available.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
