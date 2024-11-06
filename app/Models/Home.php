<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    use HasFactory;

    public function getSummarydata()
    {
        $result = [
            "barang_masuk" => BarangMasuk::all()->count(),
            "barang_keluar" => BarangKeluar::all()->count(),
            "total_barang" => item::all()->count(),
        ];

        return $result;
    }

    public function getChart()
    {
        $barangMasuk = DB::table('barang_masuk')
        ->select(DB::raw("CONCAT(YEAR(created_at), '-', MONTHNAME(created_at)) as date"), DB::raw('COUNT(*) as total'))
        ->groupBy('date')
        ->get();

        $barangKeluar = DB::table('barang_keluar')
        ->select(DB::raw("CONCAT(YEAR(created_at), '-', MONTHNAME(created_at)) as date"), DB::raw('COUNT(*) as total'))
        ->groupBy('date')
        ->get();

        $result = [
            'barangMasuk' => $barangMasuk,
            'barangKeluar' => $barangKeluar
        ];

        return $result;
    }
}
