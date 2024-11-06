<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        $pegawai = Pegawai::orderBy('created_at', 'desc')->get();


        return view('admin.pegawai', compact('user', 'pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modal.modalCreatePegawai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pegawai = Pegawai::create($request->all());

        return redirect()->route('admin.pegawai', compact('pegawai'));
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
    public function destroy(string $nip)
    {
        $pegawai = Pegawai::find($nip);
        if($pegawai)
        {
            $pegawai->delete();
            return redirect()->route('admin.akun');
        }
        return redirect()->route('admin.akun');
    }
}
