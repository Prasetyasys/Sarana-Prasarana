<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <link rel="shortcut icon" href="{{ asset('assets/compiled/svg/logo-sd.svg')}}" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <title>User Dashboard</title>

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
    }
    .navbar {
      box-shadow: 0 2px 4px rgba(0,0,0,.1);
    }
    .dashboard-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .dashboard-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,.1);
    }
    .stats-icon {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      color: white;
    }
    .green { background-color: #28a745; }
    .red { background-color: #dc3545; }
    .blue { background-color: #007bff; }
    .purple { background-color: #6f42c1; }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../pict/logo.svg" alt="Logo" width="110" height="50">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-center">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-cart"></i></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="{{ asset('assets/compiled/jpg/5.jpg') }}" alt="Avatar" class="rounded-circle" width="32" height="32">
              <span class="ms-2">User</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>My Account</a></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container my-5">
    <h1 class="text-center mb-5 animate__animated animate__fadeIn">Sarpras Dashboard</h1>
    <div class="row g-4">
      <div class="col-md-6 col-lg-3">
        <a href="item.html" class="card dashboard-card text-decoration-none animate__animated animate__fadeInUp">
          <div class="card-body text-center">
            <div class="stats-icon green mx-auto mb-3">
              <i class="bi bi-box2"></i>
            </div>
            <h5 class="card-title">Barang</h5>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="riwayat.html" class="card dashboard-card text-decoration-none animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">
          <div class="card-body text-center">
            <div class="stats-icon red mx-auto mb-3">
              <i class="bi bi-clock-history"></i>
            </div>
            <h5 class="card-title">Riwayat</h5>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="pengajuan-user.html" class="card dashboard-card text-decoration-none animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
          <div class="card-body text-center">
            <div class="stats-icon blue mx-auto mb-3">
              <i class="bi bi-clipboard-data"></i>
            </div>
            <h5 class="card-title">Pengajuan</h5>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-3">
        <a href="permintaan-user.html" class="card dashboard-card text-decoration-none animate__animated animate__fadeInUp" style="animation-delay: 0.3s;">
          <div class="card-body text-center">
            <div class="stats-icon purple mx-auto mb-3">
              <i class="bi bi-clipboard-plus"></i>
            </div>
            <h5 class="card-title">Permintaan</h5>
          </div>
        </a>
      </div>
    </div>
  </main>

  <footer class="bg-light py-4 mt-5">
    <div class="container text-center">
      <p class="mb-0">&copy; 2024 Sarpras. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
    // Add any custom JavaScript here
  </script>
</body>

</html>
