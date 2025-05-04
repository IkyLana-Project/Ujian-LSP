<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Header</title>

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }

    .nav-link {
      transition: 0.3s;
      padding: 5px;
    }

    .nav-link:hover,
    .nav-link.active {
      background-color: rgba(255, 255, 255, 0.2);
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header>
    <nav class="navbar navbar-expand-lg rounded-bottom-5 shadow-blur" style="background: linear-gradient(to right, #4B79A1, #283E51); width: 100%;">
      <div class="container">
        <a class="navbar-brand text-white fw-bold fs-3" href="home.php">Lembaga Pelatihan</a>
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <?php
              $current_page = basename($_SERVER['PHP_SELF']);
            ?>
            <li class="nav-item">
              <a class="nav-link text-white fs-5 mx-2 <?= $current_page == 'home.php' ? 'active' : '' ?>" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white fs-5 mx-2 <?= $current_page == 'pendaftaran.php' ? 'active' : '' ?>" href="pendaftaran.php">Pendaftaran</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
