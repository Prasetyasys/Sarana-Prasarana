<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\DetailBarangKeluar;
use App\Models\item;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OutgoingItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = item::all();
        $nip = Auth::user()->nip;
        $barangKeluar = BarangKeluar::all();
        $detailBarangKeluar = DetailBarangKeluar::all();
        $permintaan = Permintaan::all();

        $hakAkses = auth()->user();
        if ($hakAkses->role == 'admin') {
            return view('item.barangKeluar', [
                'item' => $item,
                'nip' => $nip,
                'barangKeluar' => $barangKeluar,
                'detailBarangKeluar' => $detailBarangKeluar,
                'permintaan' => $permintaan
            ]);
        }elseif ($hakAkses->role == 'pengawas') {
            return view('pengawas.p-barangKeluar', [
                'item' => $item,
                'nip' => $nip,
                'barangKeluar' => $barangKeluar,
                'detailBarangKeluar' => $detailBarangKeluar,
                'permintaan' => $permintaan
            ]);
        }

    }

    public function ambilBarang(Request $request)
    {
        DB::table('barang_keluar')->where('code', $request->id)->update([
            'status' => 'Diambil'
        ]);

        return redirect()->back();
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
        $item = item::all();
        $nip = Auth::user()->nip;
        $barangKeluar = BarangKeluar::where('code', $id)->get();
        $detailBarangKeluar = DetailBarangKeluar::with('item')->get();
        // dd($detailBarangKeluar);

        $hakAkses = auth()->user();
        if ($hakAkses->role == 'admin') {
            return view('item.detailBarangKeluar', [
                'item' => $item,
                'nip' => $nip,
                'barangKeluar' => $barangKeluar,
                'detailBarangKeluar' => $detailBarangKeluar,
            ]);
        }elseif ($hakAkses->role == 'pengawas') {
            return view('pengawas.p-detailBarangKeluar', [
                'item' => $item,
                'nip' => $nip,
                'barangKeluar' => $barangKeluar,
                'detailBarangKeluar' => $detailBarangKeluar,
            ]);
        }
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
