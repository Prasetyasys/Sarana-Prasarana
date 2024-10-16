<?php

namespace App\Http\Controllers;

use App\Models\DetailPermintaan;
use App\Models\item;
use App\Models\Pegawai;
use App\Models\Pengadaan;
use App\Models\Permintaan;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = item::all();
        $pegawai = Pegawai::all();
        $permintaan = Permintaan::with('pegawai')->get();
        $dpermintaan = DetailPermintaan::with('item')->get();

        $hakAkses = auth()->user();
        if ($hakAkses->role == 'admin') {
            return view('transaction.permintaan', compact('item', 'pegawai', 'permintaan', 'dpermintaan'));
        }elseif ($hakAkses->role == 'pengawas') {
            return view('pengawas.p-permintaan', compact('item', 'pegawai', 'permintaan', 'dpermintaan'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modal.modalPermintaan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $randomNumber = rand(1000, 9999);
        $kode = 'PMT' . '-' . $randomNumber;

        $kodePermintaan = $request->input('item');
        if (empty($kodePermintaan)) {
            $kodePermintaan = []; // provide a default value
        }

        $nip = $request->input('nip');
        if (empty($nip)) {
            $nip = 'default_nip_value'; // provide a default value
        }

        $pegawai = Pegawai::where('nip', $nip)->first();
        if (!$pegawai) {
            // If the nip value does not exist, throw an error or redirect back with an error message
            return redirect()->back()->withErrors(['nip' => 'NIP tidak ditemukan']);
        }

        $kuantiti = $request->jumlah;

        $jumlah = count($kodePermintaan);


        $permintaan = Permintaan::create([
            'code' => $kode,
            'nip' => $nip,
            'sifat'=>$request->sifat,
            'regarding'=>$request->regarding,
            'status'=>'Menunggu',
            'total_item' => $jumlah
        ]);

        for ($i = 0; $i < $jumlah; $i++) {
            $dpermintaan = DetailPermintaan::create([
                'request_code' => $permintaan->code,
                'item_code' => $kodePermintaan[$i],
                'quantity' => $kuantiti[$i],
                'quantity_approved' => 0
            ]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode)
    {
        $item = item::all();

        $permintaan = Pengadaan::where('code', $kode)->first();
        $dpermintaan = DetailPermintaan::with('item')->where('request_code', $permintaan->code)->get();
        return view('transaction.detailPermintaan', compact('item', 'permintaan', 'dpermintaan'));
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
