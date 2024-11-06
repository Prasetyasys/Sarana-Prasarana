<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::orderBy('created_at', 'desc')->get();

        return view('admin.supplier', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modal.modalCreateSupp');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);
        $randomNumber = rand(1000, 9999);
        $code ='SP' . '-' . $randomNumber;
        $supplier = Supplier::create([
            'code' => $code,
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.supplier');
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
    public function destroy(string $kode)
    {
        $supplier = Supplier::find($kode);
        if($supplier)
        {
            $supplier->delete();
            return redirect()->route('admin.supplier');
        }
        return redirect()->route('admin.supplier');
    }
}
