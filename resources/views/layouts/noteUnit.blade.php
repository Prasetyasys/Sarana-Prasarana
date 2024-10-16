<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <link rel="shortcut icon" href="{{ asset('assets/compiled/svg/logo-sd.svg')}}" type="image/x-icon">
  <link rel="shortcut icon" href="" type="image/png" />

  <link rel="stylesheet" href="{{asset('assets/compiled/css/app.css')}}">
  <link rel="stylesheet" href="{{asset('assets/compiled/css/app-dark.css')}}">
  <link rel="stylesheet" href="{{asset('assets/compiled/css/iconly.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
  <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />

  <title>User</title>
</head>

<body>
  <script src="../assets/static/js/initTheme.js"></script>
  <div id="app">
    <div id="main" class="layout-horizontal">
      <header class="mb-5">
        <div class="header-top">
          <div class="container">
            <div class="logo">
              <a href="index.html"><img src="../pict/logo.svg" alt="Logo" width="110" height="50"
                  style="height: 50px !important" /></a>
            </div>
            <div class="header-top-right">
              <a href="#" class="card btn btn-primary mb-1">
                <div class="d-flex justify-content-center">
                  <i class="bi bi-cart d-flex justify-content-center"></i>
                </div>
                <!-- <span
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"
                  >
                    1
                  </span> -->
              </a>
              <div class="vr"></div>
              <div class="dropdown">
                <a href="#" id="topbarUserDropdown"
                  class="user-dropdown d-flex align-items-center dropend dropdown-toggle" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <div class="avatar avatar-md2">
                    <img src="{{ asset('assets/compiled/jpg/5.jpg') }}" alt="Avatar" />
                  </div>
                  <div class="text">
                    <h6 class="user-dropdown-name">User</h6>
                    <!-- <p class="user-dropdown-status text-sm text-muted">
                        email
                      </p> -->
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                  <li class="dropdown-item">
                    <div class="theme-toggle d-flex gap-2 justify-content-center align-items-center mt-2">
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                          stroke-linejoin="round">
                          <path
                            d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                            opacity=".3"></path>
                          <g transform="translate(-210 -1)">
                            <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                            <circle cx="220.5" cy="11.5" r="4"></circle>
                            <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                          </g>
                        </g>
                      </svg>
                      <div class="form-check form-switch fs-6">
                        <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer" />
                        <label class="form-check-label"></label>
                      </div>
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                        </path>
                      </svg>
                    </div>
                  </li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li>
                    <a class="dropdown-item" href="profile.index">Akun saya</a>
                  </li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li>
                    <a class="dropdown-item" href=""> Logout </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li>
                    <a class="dropdown-item" href="#"><i class="bi bi-envelope-arrow-down"></i> Chat
                    </a>
                  </li>
                  <li></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </header>

      <main>
        <div class="content-wrapper container">
          <div class="page-heading">
            <h3>Dashboard Sarpras</h3>
          </div>
          <div class="page-content">
            <section class="row">
              <div class="col-12 col-lg-12">
                <div class="row">
                  <!-- <div class="col-12 col-md-12 col-md-6 col-sm-12">
                    <a href="item.html" class="card btn btn-primary">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div class="col-12 d-flex justify-content-center">
                            <div class="stats-icon green mb-2">
                              <i class="bi bi-box2 d-flex justify-content-center mb-2"></i>
                            </div>
                          </div>
                          <div class="col-12 d-flex justify-content-center">
                            <h4 class="text-muted font-bold">Barang</h4>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div> -->
                  <div class="col-12 col-sm-12 col-md-6">
                    <a href="item.html" class="card btn btn-primary">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-center">
                            <div class="stats-icon green mb-2">
                              <i class="bi bi-box2 d-flex justify-content-center mb-2"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-center">
                            <h4 class="text-muted font-semibold">Barang</h4>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6">
                    <a href="riwayat.html" class="card btn btn-primary">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-center">
                            <div class="stats-icon red mb-2">
                              <i class="bi bi-clock-history d-flex justify-content-center mb-2"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-center">
                            <h4 class="text-muted font-semibold">Riwayat</h4>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6">
                    <a href="pengajuan-user.html" class="card btn btn-primary">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-center">
                            <div class="stats-icon blue mb-2">
                              <i class="bi bi-clipboard-data d-flex justify-content-center mb-2"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-center">
                            <h4 class="text-muted font-semibold">
                              Pengajuan
                            </h4>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6">
                    <a href="permintaan-user.html" class="card btn btn-primary">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-center">
                            <div class="stats-icon purple mb-2">
                              <i class="bi bi-clipboard-plus d-flex justify-content-center mb-2"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-center">
                            <h4 class="text-muted font-semibold">
                              Permintaan
                            </h4>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </main>

      <footer>
        <div class="container">
          <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
              <p>2024 &copy; Sarpras</p>
            </div>
            <!-- <div class="float-end">
              <p>
                Dibuat dengan
                <span class="text-danger"><i class="bi bi-heart-fill"></i></span>
                oleh <a href="https://saugi.me">Seysho, Sarpras Team</a>
              </p>
            </div> -->
          </div>
        </div>
      </footer>
    </div>
  </div>
    <script src="{{asset('assets/static/js/components/dark.js')}}"></script>
    <script src="{{asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

    <script src="dist/layout-horizontal.html"></script>

    <script src="{{asset('assets/compiled/js/app.js')}}"></script>

    <!-- Need: Apexcharts -->
    <script src="{{asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/static/js/pages/dashboard.js')}}"></script>
    <script src="{{ asset('assets/static/js/pages/sweetalert2.js') }}"></script>
</body>

</html>
