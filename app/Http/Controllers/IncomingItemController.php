<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\DetailBarangMasuk;
use App\Models\item;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomingItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = item::all();
        $supplier = Supplier::all();
        $user = User::all();
        $bm = BarangMasuk::with('user', 'supplier')->orderBy('created_at', 'desc')->get();
        $detailbm = DetailBarangMasuk::with('item')->get();
        return view('item.barangMasuk', compact('item', 'supplier', 'bm', 'detailbm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modal.modalbarangMasuk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $randomNumber = rand(1000, 9999);
        $kode = 'BM' .'-'. $randomNumber;

        $kodeBarang = $request->namaBarang;

        $kuantiti = $request->jumlah;

        $jumlah = count($kodeBarang);

        $nip = Auth::user()->nip;

        $bm = BarangMasuk::create([
            'code' => $kode,
            'nip' => $nip,
            'supplier_code' => $request->supplier_code,
            'total_item' => $jumlah
        ]);

        for ($i = 0; $i < $jumlah; $i++) {

            $item = item::where('code', $kodeBarang[$i])->first();
            if($item){
                $item->stock += $kuantiti[$i];
                $item->save();
            }
            $detailbm = DetailBarangMasuk::create([
                'incoming_item_code' => $bm->code,
                'item_code' => $kodeBarang[$i],
                'quantity' => $kuantiti[$i]
            ]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $item = item::all();

        $bm = BarangMasuk::where('code', $id)->get();
        $detailbm = DetailBarangMasuk::with('item')->where('incoming_item_code', $bm->code)->get();

        // dd($detailbm);


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
    public function destroy(string $kodeBarang)
    {

    }
}
