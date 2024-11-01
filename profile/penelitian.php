<?php
// Include database connection file
require_once("conn.php");

// Menerima NIM dari POST
$nim = $_POST['nim'] ?? '';

// Inisialisasi variabel
$namaMahasiswa = '';
$judul = '';
$dospem1 = '';
$dospem2 = '';
$penguji1 = '';
$penguji2 = '';
$penguji3 = '';

// Cek apakah NIM tidak kosong
if (!empty($nim)) {
    // Query untuk mengambil data mahasiswa berdasarkan NIM
    $queryMahasiswa = "SELECT id_m, nama_mahasiswa FROM tb_mahasiswa WHERE nim = ?";
    $stmtMahasiswa = $mysqli->prepare($queryMahasiswa);

    if ($stmtMahasiswa) { // Ensure the statement was prepared successfully
        $stmtMahasiswa->bind_param('s', $nim);
        $stmtMahasiswa->execute();
        $resultMahasiswa = $stmtMahasiswa->get_result();

        // Ambil data mahasiswa
        if ($resultMahasiswa->num_rows > 0) {
            $mahasiswa = $resultMahasiswa->fetch_assoc();
            $namaMahasiswa = $mahasiswa['nama_mahasiswa'];
            $idMahasiswa = $mahasiswa['id_m'];

            // Query untuk mengambil data skripsi berdasarkan id_m
            $querySkripsi = "SELECT judul, dospembimbing1, dospembimbing2, penguji1, penguji2, penguji3 FROM tb_skripsi WHERE id_m = ?";
            $stmtSkripsi = $mysqli->prepare($querySkripsi);

            if ($stmtSkripsi) { // Ensure the statement was prepared successfully
                $stmtSkripsi->bind_param('i', $idMahasiswa);
                $stmtSkripsi->execute();
                $resultSkripsi = $stmtSkripsi->get_result();

                // Ambil data skripsi
                if ($resultSkripsi->num_rows > 0) {
                    $skripsi = $resultSkripsi->fetch_assoc();
                    $judul = $skripsi['judul'];
                    $dospem1 = $skripsi['dospembimbing1'];
                    $dospem2 = $skripsi['dospembimbing2'];
                    $penguji1 = $skripsi['penguji1'];
                    $penguji2 = $skripsi['penguji2'];
                    $penguji3 = $skripsi['penguji3'];
                }
                // Close the statement for skripsi
                $stmtSkripsi->close();
            } else {
                // Log or handle error preparing skripsi statement
                error_log("Failed to prepare skripsi statement: " . $mysqli->error);
            }
        }
        // Close the statement for mahasiswa
        $stmtMahasiswa->close();
    } else {
        // Log or handle error preparing mahasiswa statement
        error_log("Failed to prepare mahasiswa statement: " . $mysqli->error);
    }
}

// Tutup koneksi
$mysqli->close();
?>

<!-- HTML untuk menampilkan data -->
<div class="row">
    <div class="col-12 col-xl-4">
        <div class="card h-100 bg-primary">
            <div class="card-body p-3">
                <div class="d-flex flex-column align-items-center text-center">
                    <div class="avatar mb-3" style="height: 6cm; width: auto;">
                    <?php
                        $nim = htmlspecialchars($nim); // Mengamankan NIM untuk output
                        $imagePath = "assets/img/mahasiswa/{$nim}.jpg";
                        $defaultImage = "assets/img/mahasiswa/default.jpg";

                        // Menentukan gambar mana yang akan digunakan
                        $imgSrc = file_exists($imagePath) ? $imagePath : $defaultImage;
                    ?>

                    <img src="<?php echo $imgSrc; ?>" alt="profile_image" class="border-radius-lg shadow-sm" style="height: 100%; width: auto;">

                    </div>
                    <div class="text-start w-100">
                        <h5 class="mb-1 text-white font-weight-bolder">
                            <?php echo htmlspecialchars($namaMahasiswa); ?>
                        </h5>
                        <p class="mb-0 text-white text-sm">
                            NIM: <?php echo htmlspecialchars($nim); ?>
                        </p>
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
                <p class="text-sm">
                    <?php echo htmlspecialchars($judul); ?>
                </p>
                <hr class="horizontal gray-light my-4">
                <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                        <div class="col-3"><strong class="text-dark">Primary Supervisor</strong></div>
                        <div class="col-1 text-center">:</div>
                        <div class="col-7"><?php echo htmlspecialchars($dospem1); ?></div>
                    </li>
                    <li class="list-group-item border-0 ps-0 text-sm d-flex">
                        <div class="col-3"><strong class="text-dark">Secondary Supervisor</strong></div>
                        <div class="col-1 text-center">:</div>
                        <div class="col-7"><?php echo htmlspecialchars($dospem2); ?></div>
                    </li>
                    <li class="list-group-item border-0 ps-0 text-sm d-flex">
                        <div class="col-3"><strong class="text-dark">Defense Examiner 1</strong></div>
                        <div class="col-1 text-center">:</div>
                        <div class="col-7"><?php echo htmlspecialchars($penguji1); ?></div>
                    </li>
                    <li class="list-group-item border-0 ps-0 text-sm d-flex">
                        <div class="col-3"><strong class="text-dark">Defense Examiner 2</strong></div>
                        <div class="col-1 text-center">:</div>
                        <div class="col-7"><?php echo htmlspecialchars($penguji2); ?></div>
                    </li>
                    <li class="list-group-item border-0 ps-0 pb-0 d-flex">
                        <div class="col-3"><strong class="text-dark text-sm">Defense Examiner 3</strong></div>
                        <div class="col-1 text-center">:</div>
                        <div class="col-7"><?php echo htmlspecialchars($penguji3); ?></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
