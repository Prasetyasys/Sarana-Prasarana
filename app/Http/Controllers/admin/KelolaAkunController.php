<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelolaAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        $pegawai = Pegawai::all();


        return view('admin.user', compact('user', 'pegawai'));
        // return view('admin.pegawai', compact('user', 'pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $u
        $pegawai = Pegawai::all();

        return view('modal.modalCreateAcc', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $user = User::create($request->all());


        return redirect()->route('admin.user', compact('user'));
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
        $user = User::find($nip);
        if($user)
        {
            $user->delete();
            return redirect()->route('admin.user');
        }
        return redirect()->route('admin.user');
    }
}
