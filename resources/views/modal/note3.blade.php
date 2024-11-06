<!-- Tambahkan CSS custom setelah Bootstrap CSS -->
<style>
    /* Custom CSS untuk mempercantik dashboard */
    :root {
      --primary-color: #435ebe;
      --secondary-color: #6c757d;
      --success-color: #198754;
      --info-color: #0dcaf0;
      --warning-color: #ffc107;
      --danger-color: #dc3545;
    }

    /* Card styling */
    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      margin-bottom: 1.5rem;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      background-color: transparent;
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      padding: 1.5rem;
    }

    .card-header h4 {
      margin: 0;
      font-weight: 600;
      color: var(--primary-color);
    }

    .card-body {
      padding: 1.5rem;
    }

    /* Stats cards */
    .stats-icon {
      width: 50px;
      height: 50px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }

    .stats-icon i {
      font-size: 1.5rem;
      color: white;
    }

    .stats-icon.purple {
      background: linear-gradient(45deg, #6f42c1, #8557d7);
    }

    .stats-icon.blue {
      background: linear-gradient(45deg, #0d6efd, #3d8bfd);
    }

    .stats-icon.green {
      background: linear-gradient(45deg, #198754, #28a745);
    }

    .font-semibold {
      font-weight: 600;
    }

    .font-extrabold {
      font-weight: 800;
    }

    /* Table styling */
    .table-responsive {
      border-radius: 10px;
      overflow: hidden;
    }

    .table {
      margin-bottom: 0;
    }

    .table thead th {
      background-color: #f8f9fa;
      border-bottom: none;
      color: var(--secondary-color);
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.75rem;
      padding: 1rem;
    }

    .table tbody td {
      padding: 1rem;
      vertical-align: middle;
    }

    .table-hover tbody tr:hover {
      background-color: rgba(67, 94, 190, 0.05);
    }

    /* Avatar styling */
    .avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      overflow: hidden;
    }

    .avatar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* Status badges */
    .status-badge {
      padding: 0.5rem 1rem;
      border-radius: 50px;
      font-size: 0.75rem;
      font-weight: 600;
    }

    .status-menunggu {
      background-color: rgba(255, 193, 7, 0.1);
      color: var(--warning-color);
    }

    /* Chart container */
    #chart-summary-barang {
      min-height: 400px;
      padding: 1rem;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .card-body {
        padding: 1rem;
      }

      .stats-icon {
        width: 40px;
        height: 40px;
      }

      .stats-icon i {
        font-size: 1.25rem;
      }

      .table thead th {
        font-size: 0.7rem;
        padding: 0.75rem;
      }

      .table tbody td {
        padding: 0.75rem;
      }
    }

    /* Animation untuk loading state */
    @keyframes pulse {
      0% { opacity: 1; }
      50% { opacity: 0.5; }
      100% { opacity: 1; }
    }

    .loading {
      animation: pulse 1.5s infinite;
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }

    ::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb {
      background: var(--primary-color);
      border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #354899;
    }
</style>

    <!-- Modifikasi pada HTML untuk menggunakan class-class baru -->
    <section class="row g-3 px-4 py-5">
        <div class="col-12">
            <!-- Summary Cards -->
            <div class="row g-3 mb-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="stats-icon purple me-3">
                                <i class="iconly-boldShow"></i>
                            </div>
                            <div>
                                <h6 class="text-muted font-semibold">Barang Masuk</h6>
                                <h3 class="font-extrabold mb-0">{{ $getSummaryData['barang_masuk'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Repeat similar structure for other summary cards -->
            </div>

            <!-- Chart Card -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Barang Masuk & Keluar</h4>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-primary">Bulan Ini</button>
                        <button class="btn btn-sm btn-outline-primary">Tahun Ini</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chart-summary-barang"></div>
                </div>
            </div>

            <!-- Table Card -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Table Item Minimal</h4>
                    <div class="form-group">
                        <input type="search" class="form-control form-control-sm" placeholder="Cari item...">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Stok Minimum</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item as $i)
                                @if ($i->stock < $i->minimum_stock)
                                <tr>
                                    <td><span class="badge bg-light text-dark">{{ $i->code }}</span></td>
                                    <td>{{ $i->name }}</td>
                                    <td><span class="badge bg-info">{{ $i->kategori->alias }}</span></td>
                                    <td>{{ $i->unit }}</td>
                                    <td>Rp. {{ number_format($i->price, 0, ',', '.') }}</td>
                                    <td><span class="badge bg-danger">{{ $i->stock }}</span></td>
                                    <td>{{ $i->minimum_stock }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Status Cards -->
            <div class="row g-4">
                <div class="col-12 col-xl-6">
                    <div class="card h-100">
                        <div class="card-header">
                            <h4>Pengadaan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Unit</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengadaan as $pda)
                                        @if ($pda->status == 'Menunggu')
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-3">
                                                        <img src="{{ asset('assets/compiled/jpg/5.jpg') }}" alt="Avatar">
                                                    </div>
                                                    <span class="font-semibold">{{ $pda->pegawai->name }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="status-badge status-menunggu">{{ $pda->status }}</span>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Repeat similar structure for Permintaan card -->
            </div>
        </div>
    </section>

    <!-- Tambahkan script untuk chart customization -->
    <script>
    var options = {
        // ... existing options ...
        chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: true,
                tools: {
                    download: false,
                }
            },
            fontFamily: 'inherit'
        },
        colors: ['#435ebe', '#198754'],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded',
                borderRadius: 4
            },
        },
        grid: {
            borderColor: '#f1f1f1',
            row: {
                colors: ['transparent', 'transparent']
            }
        },
        // ... rest of the options
    };
    </script>
