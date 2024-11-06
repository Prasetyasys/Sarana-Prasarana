<?php

namespace App\Http\Controllers;

use App\Models\DetailPengadaan;
use App\Models\item;
use App\Models\Pegawai;
use App\Models\Pengadaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = item::all();
        $pegawai = Pegawai::all();
        $pengadaan = Pengadaan::with('pegawai')->orderby('created_at', 'desc')->get();
        $dpengadaan = DetailPengadaan::with('item')->get();

        $hakAkses = auth()->user();
        if ($hakAkses->role == 'admin') {
            return view('transaction.pengadaan', compact('item', 'pegawai', 'pengadaan', 'dpengadaan'));
        }elseif ($hakAkses->role == 'pengawas') {
            return view('pengawas.p-pengadaan', compact('item', 'pegawai', 'pengadaan', 'dpengadaan'));
        }elseif ($hakAkses->role == 'unit') {
            return view('unit.pengadaan', compact('item', 'pegawai', 'pengadaan', 'dpengadaan'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modal.modalPengadaan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());

        $randomNumber = rand(1000, 9999);
        $kode = 'PDA' .'-'. $randomNumber;

        $kodePengadaan = $request->input('item');
        if (empty($kodePengadaan)) {
            $kodePengadaan = []; // provide a default value
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

        $jumlah = count($kodePengadaan);


        $pengadaan = Pengadaan::create([
            'code' => $kode,
            'nip' => $nip,
            'sifat'=>$request->sifat,
            'regarding'=>$request->regarding,
            'status'=>'Menunggu',
            'total_item' => $jumlah
        ]);

        // dd($pengadaan);


        for ($i = 0; $i < $jumlah; $i++) {
            $dpengadaan = DetailPengadaan::create([
                'submission_code' => $pengadaan->code,
                'item_code' => $kodePengadaan[$i],
                'quantity' => $kuantiti[$i],
                'quantity_approved' => -1
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

        $pengadaan = Pengadaan::where('code', $kode)->first();
        // dd($pengadaan);
        $dpengadaan = DetailPengadaan::with('item')->where('submission_code', $pengadaan->code)->get();
        // dd($dpengadaan);
        $hakAkses = auth()->user();
        if ($hakAkses->role == 'admin') {
            return view('transaction.detailPengadaan', compact('item', 'pengadaan', 'dpengadaan'));
        }elseif ($hakAkses->role == 'pengawas') {
            return view('pengawas.p-detailPengadaan', compact('item', 'pengadaan', 'dpengadaan'));
        }elseif ($hakAkses->role == 'unit') {
            return view('unit.detailPengadaan', compact('item', 'pengadaan', 'dpengadaan'));
        }
    }

    public function accept(Request $request)
    {
        DB::table('detail_pengadaan')->where('id', $request->id)->update([
            'quantity_approved' => $request->quantity_approved
        ]);

        // dd($request->all());

        return redirect()->back();
    }

    public function reject(Request $request)
    {
        DB::table('pengadaan')->where('code', $request->id)->update([
            'status' => 'Ditolak'
        ]);
        return redirect()->route('admin.pengadaan');
    }

    public function finish(Request $request)
    {
        $res = DB::table('pengadaan')->where('code', $request->id)->update([
            'status' => 'Disetujui'
        ]);

        // dd($request->all(), $res, DB::table('pengadaan')->where('code', $request->id)->get());

        return redirect()->route('admin.pengadaan');
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
