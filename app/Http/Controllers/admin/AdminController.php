<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\item;
use App\Models\Pengadaan;
use App\Models\Permintaan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __invoke()
    {
        $pengadaan = Pengadaan::all();
        $permintaan = Permintaan::all();
        $item = item::all();

        $model = new Home();
        $getSummaryData = $model->getSummarydata();

        $getChart = $model->getChart();
        $allMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        $barangMasukData = $this->fillDataForAllMonths($getChart["barangMasuk"], $allMonths);
        $barangKeluarData = $this->fillDataForAllMonths($getChart["barangKeluar"], $allMonths);

        $result = [
            [
                "name" => "Barang Masuk",
                "data" => $barangMasukData
            ],
            [
                "name" => "Barang Keluar",
                "data" => $barangKeluarData
            ]
        ];

        $categories = $allMonths;

        return view('admin.dashboard', compact('getSummaryData', 'getChart', 'result', 'categories', 'pengadaan', 'permintaan', 'item'));
    }

    function fillDataForAllMonths($data, $allMonths)
    {
        $filledData = array_fill(0, count($allMonths), 0);
        foreach ($data as $item) {
            $month = explode("-", $item->date)[1];
            $index = array_search($month, $allMonths);
            if ($index !== false) {
                $filledData[$index] = $item->total;
            }
        }
        return $filledData;
    }
}
