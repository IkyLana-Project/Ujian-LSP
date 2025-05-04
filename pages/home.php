<?php
require '../data.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembaga Pelatihan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .banner {
            background-image: url('../assets/banner.jpg');
            background-size: cover;
            background-position: center;
            height: 400px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.6);
            border-radius: 20px;
            margin: 50px 0;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-8px);
        }

        .card img {
            height: 250px;
            object-fit: cover;
            border-radius: 15px 15px 0 0;
        }

        .btn-daftar {
            border: none;
            background-color: #FFA55D;
            padding: 8px 20px;
            border-radius: 20px;
            margin-bottom: 15px;
        }

        .btn-daftar a{
            color: white;
            font-weight: bold;
            text-decoration: none;
        }

        .btn-daftar:hover {
            background-color: #f5c45e;
        }
    </style>
</head>
<body>

    <?php include '../components/header.php'; ?>
    
    <!-- Banner -->
    <div class="container">
        <div class="banner rounded">
            <div>
                <h1 class="display-4 fw-bold">Tingkatkan Skill Anda Bersama Kami</h1>
                <p class="fs-5">Pilih program pelatihan yang sesuai dengan minat dan tujuan karier Anda.</p>
            </div>
        </div>
    </div>

    <!-- Kelas Kursus -->
    <div class="container py-5">
        <div class="row text-center mb-4">
            <h2 class="fw-bold">Program Kursus Kami</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="../assets/desain-grafis.jpg" alt="Desain Grafis" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Desain Grafis</h5>
                        <p>Biaya: Rp 10.000 / minggu</p>
                        <p>Kuasai Photoshop, Canva, dan Figma untuk desain modern.</p>
                        <button class="btn-daftar"><a href="pendaftaran.php?kursus=desain-grafis">Daftar Sekarang</a></button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="../assets/pemrograman.jpg" alt="Pemrograman" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pemrograman</h5>
                        <p>Biaya: Rp 50.000 / minggu</p>
                        <p>Pelajari HTML, CSS, JavaScript, PHP, dan framework modern.</p>
                        <button class="btn-daftar"><a href="pendaftaran.php?kursus=pemrograman">Daftar Sekarang</a></button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="../assets/digital-marketing.jpg" alt="Digital Marketing" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Digital Marketing</h5>
                        <p>Biaya: Rp 100.000 / minggu</p>
                        <p>Strategi promosi online, SEO, social media, dan lainnya.</p>
                        <button class="btn-daftar"><a href="pendaftaran.php?kursus=digital-marketing">Daftar Sekarang</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profil Lembaga -->
    <div class="container py-5 bg-light rounded-4 shadow-sm">
        <h2 class="mb-4 text-center">Profil Lembaga</h2>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Alamat:</strong> Jl. Cempaka Raya No. 23, Banjarmasin, Indonesia.</p>
                <p><strong>Email:</strong> lembaga.pelatihan@gmail.com</p>
                <p><strong>Telepon:</strong> +62 813 1234 5678</p>
            </div>
            <div class="col-md-6">
                <p style="text-align: justify;">
                    Kami adalah lembaga pelatihan profesional yang fokus pada peningkatan keterampilan digital di era modern. Kami menghadirkan pembelajaran yang menyenangkan, interaktif, dan bermanfaat.
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
     <?php include '../components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
