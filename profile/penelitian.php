<?php
// Include database connection file
require_once("conn.php");

// Safely get the NIM from POST request
$nim = $_POST['nim'] ?? '';

// Initialize variables
$namaMahasiswa = '';
$judul = '';
$dospem1 = '';
$dospem2 = '';
$penguji1 = '';
$penguji2 = '';
$penguji3 = '';
$peminatan = '';  // Variabel untuk menyimpan peminatan

if (!empty($nim)) {
    // Prepare query to get student data
    $queryMahasiswa = "SELECT id_m, nama_mahasiswa, peminatan FROM tb_mahasiswa WHERE nim = ?";
    $stmtMahasiswa = $mysqli->prepare($queryMahasiswa);

    if ($stmtMahasiswa) {
        $stmtMahasiswa->bind_param('s', $nim);
        $stmtMahasiswa->execute();
        $resultMahasiswa = $stmtMahasiswa->get_result();

        if ($resultMahasiswa->num_rows > 0) {
            $mahasiswa = $resultMahasiswa->fetch_assoc();
            $namaMahasiswa = $mahasiswa['nama_mahasiswa'];
            $idMahasiswa = $mahasiswa['id_m'];
            $peminatan = $mahasiswa['peminatan'];  // Menyimpan peminatan mahasiswa

            // Query for thesis data
            $querySkripsi = "SELECT judul, dospembimbing1, dospembimbing2, penguji1, penguji2, penguji3 FROM tb_skripsi WHERE id_m = ?";
            $stmtSkripsi = $mysqli->prepare($querySkripsi);

            if ($stmtSkripsi) {
                $stmtSkripsi->bind_param('i', $idMahasiswa);
                $stmtSkripsi->execute();
                $resultSkripsi = $stmtSkripsi->get_result();

                if ($resultSkripsi->num_rows > 0) {
                    $skripsi = $resultSkripsi->fetch_assoc();
                    $judul = $skripsi['judul'];
                    $dospem1 = $skripsi['dospembimbing1'];
                    $dospem2 = $skripsi['dospembimbing2'];
                    $penguji1 = $skripsi['penguji1'];
                    $penguji2 = $skripsi['penguji2'];
                    $penguji3 = $skripsi['penguji3'];
                }
                $stmtSkripsi->close();
            } else {
                error_log("Failed to prepare skripsi statement: " . $mysqli->error);
            }
        }
        $stmtMahasiswa->close();
    } else {
        error_log("Failed to prepare mahasiswa statement: " . $mysqli->error);
    }
}

// Tentukan kelas CSS berdasarkan peminatan
$bgClass = '';
switch ($peminatan) {
    case 'RPL':
        $bgClass = 'bg-info';  // Untuk RPL
        $bgclassText = 'text-info';  // Untuk RPL
        break;
    case 'Jaringan':
        $bgClass = 'bg-dark';  // Untuk Jaringan
        $bgclassText = 'text-dark';
        break;
    case 'KCV':
        $bgClass = 'bg-primary';  // Untuk KCV
        $bgclassText = 'text-primary';
        break;
    default:
        $bgClass = '';  // Default tanpa kelas khusus
}
?>

<!-- Display Student Data -->
<div class="row">
    <div class="col-12 col-xl-4">
        <div class="card h-100 <?php echo $bgClass; ?>">  <!-- Apply background class based on peminatan -->
            <div class="card-body p-3">
                <div class="d-flex flex-column align-items-center text-center">
                    <div class="avatar mb-3" style="height: 6cm; width: auto;">
                        <?php
                            $nim = htmlspecialchars($nim);
                            $imagePath = "assets/img/mahasiswa/{$nim}.jpg";
                            $defaultImage = "assets/img/mahasiswa/default.jpg";
                            $imgSrc = file_exists($imagePath) ? $imagePath : $defaultImage;
                        ?>
                        <img src="<?php echo $imgSrc; ?>" alt="profile_image" class="border-radius-lg shadow-sm" style="height: 100%; width: auto;">
                    </div>
                    <div class="text-start w-100">
                        <h5 class="mb-1 text-white font-weight-bolder"><?php echo htmlspecialchars($namaMahasiswa); ?></h5>
                        <p class="mb-0 text-white text-sm">NIM: <?php echo htmlspecialchars($nim); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-8">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-0">Research Title</h6>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="javascript:;">
                            <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
            <h6>Title : <span class="<?php echo $bgclassText; ?>"><?php echo htmlspecialchars($judul); ?></span></h6>
            <table class="table align-items-center mb-0">
    <tbody>
        <tr>
            <td>
                <p class="p-2 text-xs font-weight-bold mb-0">1</p>
            </td>
            <td>
                <p class="p-2 text-xs font-weight-bold mb-0">Pembimbing 1</p>
            </td>
            <td>
                <p class="text-xs font-weight-bold mb-0"><?php echo htmlspecialchars($dospem1); ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="p-2 text-xs font-weight-bold mb-0">2</p>
            </td>
            <td>
                <p class="p-2 text-xs font-weight-bold mb-0">Pembimbing 2</p>
            </td>
            <td>
                <p class="text-xs font-weight-bold mb-0"><?php echo htmlspecialchars($dospem2); ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="p-2 text-xs font-weight-bold mb-0">3</p>
            </td>
            <td>
                <p class="p-2 text-xs font-weight-bold mb-0">Penguji 1</p>
            </td>
            <td>
                <p class="text-xs font-weight-bold mb-0"><?php echo htmlspecialchars($penguji1); ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="p-2 text-xs font-weight-bold mb-0">4</p>
            </td>
            <td>
                <p class="p-2 text-xs font-weight-bold mb-0">Penguji 2</p>
            </td>
            <td>
                <p class="text-xs font-weight-bold mb-0"><?php echo htmlspecialchars($penguji2); ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="p-2 text-xs font-weight-bold mb-0">5</p>
            </td>
            <td>
                <p class="p-2 text-xs font-weight-bold mb-0">Penguji 3</p>
            </td>
            <td>
                <p class="text-xs font-weight-bold mb-0"><?php echo htmlspecialchars($penguji3); ?></p>
            </td>
        </tr>
    </tbody>
</table>

                

            </div>
            </div>
        </div>
    </div>
</div>
