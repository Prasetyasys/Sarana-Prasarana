<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use App\Models\item;

class PengawasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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

        return view('pengawas.p-dashboard', compact('getSummaryData', 'getChart', 'result', 'categories'));
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
