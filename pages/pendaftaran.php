<?php
require '../data.php';

$jenisKursus = $_GET['kursus'] ?? ''; // tangkap dari URL

$kursus = [
    'desain-grafis' => ['nama' => 'Desain Grafis', 'harga' => 10000],
    'pemrograman' => ['nama' => 'Pemrograman', 'harga' => 50000],
    'digital-marketing' => ['nama' => 'Digital Marketing', 'harga' => 100000],
];

// Default ke GET atau ke desain-grafis jika tidak valid
$jenisKursus = $_GET['kursus'] ?? 'desain-grafis';
if (!array_key_exists($jenisKursus, $kursus)) {
    $jenisKursus = 'desain-grafis';
}

$nama = '';
$nik = '';
$email = '';
$metode = 'online';
$tanggalMulai = '';
$durasi = 1;
$sertifikat = false;
$total = 0;
$error = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    ambilInput();

    if (strlen($nik) < 16) $error['nik'] = 'NIK harus 16 digit';
    if (strlen($nik) > 16) $error['nik'] = 'NIK Lebih Dari 16 digit';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $error['email'] = 'Format email tidak valid';
    if (!is_numeric($durasi) || $durasi < 1) $error['durasi'] = 'Durasi harus angka lebih dari 0';

    $total = $kursus[$jenisKursus]['harga'] * $durasi;
    if ($metode == 'tatap') $total += 10000;
    if ($sertifikat) $total += 50000;
}

function ambilInput() {
    global $nama, $nik, $email, $jenisKursus, $metode, $tanggalMulai, $durasi, $sertifikat, $total, $error;

    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $email = $_POST['email'];
    $jenisKursus = $_POST['jenisKursus'];
    $metode = $_POST['metode'];
    $tanggalMulai = $_POST['tanggalMulai'];
    $durasi = (int) $_POST['durasi'];
    $total = (int) $_POST['total'];
    $sertifikat = isset($_POST['sertifikat']);
}

function getError($name) {
    global $error;
    return $error[$name] ?? '';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Pendaftaran Kursus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body style="font-family: 'Inter', sans-serif;">

    <?php require '../components/header.php'; ?>

    <div class="container">
        <h2 class="text-center mb-4 mt-4">Formulir Pendaftaran Kursus</h2>
        <form method="post" id="formKursus">
            <div class="card p-4 shadow-lg">
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" required value="<?= $nama ?>" placeholder="Masukkan nama lengkap...">
                </div>
                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input type="number" class="form-control" name="nik" required value="<?= $nik ?>" placeholder="Masukkan NIK...">
                    <small class="text-danger"><?= getError('nik') ?></small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required value="<?= $email ?>" placeholder="Masukkan email...">
                    <small class="text-danger"><?= getError('email') ?></small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kursus</label>
                    <select class="form-select" name="jenisKursus" id="jenisKursus">
                        <?php foreach ($kursus as $key => $k): ?>
                            <option value="<?= $key ?>" <?= $key == $jenisKursus ? 'selected' : '' ?>>
                                <?= $k['nama'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Metode Belajar</label>
                    <select class="form-select" name="metode">
                        <option value="online" <?= $metode == 'online' ? 'selected' : '' ?>>Online</option>
                        <option value="tatap" <?= $metode == 'tatap' ? 'selected' : '' ?>>Tatap Muka (+Rp10.000)</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control" name="tanggalMulai" value="<?= $tanggalMulai ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Durasi (minggu)</label>
                    <input type="number" class="form-control" name="durasi" id="durasi" value="<?= $durasi ?>" min="1">
                    <small class="text-danger"><?= getError('durasi') ?></small>
                </div>
                <div class="mb-3">
                <label class="form-label">Harga</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="text" class="form-control" readonly id="hargaPerMinggu" value="<?= number_format($kursus[$jenisKursus]['harga'], 0, ',', '.') ?>">
                </div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="sertifikat" id="sertifikat" <?= $sertifikat ? 'checked' : '' ?>>
                    <label class="form-check-label" for="sertifikat">Ceklis jika ingin Sertifikat (+Rp50.000)</label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Total Biaya</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="text" class="form-control" readonly value="<?= number_format($total, 2, ',', '.') ?>">
                        <input type="hidden" name="total" value="<?= $total ?>">
                    </div>
                </div>

                <div class="d-flex gap-3 mt-3">
                    <a href="./home.php" class="btn btn-danger align-self-center p-2">Batal</a>
                    <button type="submit" name="hitung" class="btn btn-warning text-light">Hitung Biaya</button>
                    <button type="button" class="btn btn-success" onclick="konfirmasi()">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <?php include '../components/footer.php'; ?>

    <script>
        const form = document.getElementById('formKursus');

        function konfirmasi() {
            const total = Number(form.total.value).toLocaleString('id-ID', { minimumFractionDigits: 2 });
            const kursus = form.jenisKursus.options[form.jenisKursus.selectedIndex].text;
            const metode = form.metode.options[form.metode.selectedIndex].text;
            const sertifikat = form.sertifikat.checked ? 'Ya' : 'Tidak';

            Swal.fire({
                title: 'Konfirmasi Pendaftaran',
                html: `
                    <ul style="text-align:left">
                        <li><b>Nama:</b> ${form.nama.value}</li>
                        <li><b>Email:</b> ${form.email.value}</li>
                        <li><b>Kursus:</b> ${kursus}</li>
                        <li><b>Metode:</b> ${metode}</li>
                        <li><b>Tanggal Mulai:</b> ${form.tanggalMulai.value}</li>
                        <li><b>Durasi:</b> ${form.durasi.value} minggu</li>
                        <li><b>Sertifikat:</b> ${sertifikat}</li>
                        <li><b>Total Biaya:</b> Rp ${total}</li>
                    </ul>
                `,
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal'
            }).then((res) => {
                if (res.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
    <script>
    const hargaKursus = {
        'desain-grafis': 10000,
        'pemrograman': 50000,
        'digital-marketing': 100000
    };

    const jenisKursus = document.getElementById('jenisKursus');
    const durasi = document.getElementById('durasi');
    const hargaPerMinggu = document.getElementById('hargaPerMinggu');

    function updateHargaSubtotal() {
        const selected = jenisKursus.value;
        const durasiMinggu = parseInt(durasi.value) || 1;
        const harga = hargaKursus[selected] || 0;
        const subtotal = harga * durasiMinggu;
        hargaPerMinggu.value = subtotal.toLocaleString('id-ID');
    }

    jenisKursus.addEventListener('change', updateHargaSubtotal);
    durasi.addEventListener('input', updateHargaSubtotal);

    window.addEventListener('DOMContentLoaded', updateHargaSubtotal);
    </script>
</body>
</html>
