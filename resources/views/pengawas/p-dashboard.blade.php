@extends('layouts.pengawasMain')
@section('content')
<section class="row">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="col-6 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon purple mb-2">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Barang Masuk</h6>
                                <h6 class="font-extrabold mb-0">{{ $getSummaryData['barang_masuk'] }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <i class="iconly-boldProfile"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Barang Keluar</h6>
                                <h6 class="font-extrabold mb-0">{{ $getSummaryData['barang_keluar'] }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon green mb-2">
                                    <i class="iconly-boldAdd-User"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Jumlah Barang</h6>
                                <h6 class="font-extrabold mb-0">{{ $getSummaryData['total_barang'] }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Barang Masuk & Keluar</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-summary-barang"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Table Item Minimal</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="itemTable" class="table table-striped table-hover" style="width:100%">
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
                                        <td>{{ $i->code }}</td>
                                        <td>{{ $i->name }}</td>
                                        <td>{{ $i->kategori->alias }}</td>
                                        <td>{{ $i->unit }}</td>
                                        <td>Rp. {{ number_format($i->price, 0, ',', '.') }}</td>
                                        <td>{{ $i->stock }}</td>
                                        <td>{{ $i->minimum_stock }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Pengadaan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Unit</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{ dd($pengadaan) }} --}}
                                    @foreach ($pengadaan as $pda)
                                    @if ($pda->status == 'Menunggu')
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-md">
                                                    <img src="{{ asset('assets/compiled/jpg/5.jpg') }}" class="img-fluid">
                                                </div>
                                                <p class="font-bold ms-3 mb-0">{{ $pda->pegawai->name }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0">{{ $pda->status }}</p>
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
            <div class="col-12 col-xl-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Permintaan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Unit</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{ dd($permintaan) }} --}}
                                    @foreach ($permintaan as $pmt)
                                    @if ($pmt->status == 'Menunggu')
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-md">
                                                    <img src="{{ asset('assets/compiled/jpg/5.jpg') }}" class="img-fluid">
                                                </div>
                                                <p class="font-bold ms-3 mb-0">{{ $pmt->pegawai->name }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0">{{ $pmt->status }}</p>
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
        </div>
    </div>
</section>

<script>
    var options = {
        series: [{
            name: 'Barang Masuk',
            data: <?php echo json_encode($result[0]['data']); ?>
        }, {
            name: 'Barang Keluar',
            data: <?php echo json_encode($result[1]['data']); ?>
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: <?php echo json_encode($categories); ?>,
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart-summary-barang"), options);
    chart.render();
</script>
@endsection
