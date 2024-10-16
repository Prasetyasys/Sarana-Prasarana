<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\DetailBarangMasuk;
use App\Models\item;
use Illuminate\Http\Request;

class IncomingItemDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailbm = DetailBarangMasuk::all();
        $bm = BarangMasuk::all();
        return view('item.d-barangmasuk', compact('detailbm', 'bm'));
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
    public function show(string $kode)
    {
        $item = item::all();

        $bm = BarangMasuk::where('code', $kode)->get();
        $detailbm = DetailBarangMasuk::with('item')->where('incoming_item_code', $kode)->get();



        return view('item.d-barangmasuk', compact('detailbm', 'item', 'bm'));
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
