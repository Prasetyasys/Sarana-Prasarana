<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {
        $item = item::orderBy('created_at', 'desc')->get();
        $categories = Kategori::all();
        // $item = Item::paginate(10);


        $hakAkses = auth()->user();
        if ($hakAkses->role == 'admin') {
            return view('item.list', [
                'item' => $item,
                'categories' => $categories
            ]);
        }elseif ($hakAkses->role == 'pengawas') {
            return view('pengawas.p-dataBarang', [
                'item' => $item,
                'categories' => $categories
            ]);
        }elseif ($hakAkses->role == 'unit') {
            return view('unit.itemData', [
                'item' => $item,
                'categories' => $categories
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Kategori::all();

        return view('item.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $kategoriID = $request->input('category_id');
        $kategori = Kategori::find($kategoriID);

        // dd($kategori);
        $namaKode = $kategori->alias;

        $randomNumber = rand(1000, 9999);
        $code = $namaKode . '-' . $randomNumber;
        $item = item::create([
            'code' => $code,
            'name' => $request->name,
            'unit' => $request->unit,
            'price' => $request->price,
            'stock' => $request->stock,
            'minimum_stock' => $request->stokmin,
            'category_id' => $request->category_id,
            'description' => $request->description
        ]);

        return redirect()->route('item.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = item::where('code', $id)->get();


        $hakAkses = auth()->user();
        if ($hakAkses->role == 'admin') {
            return view('item.detailBarang', [
                'item' => $item,
            ]);
        }elseif ($hakAkses->role == 'pengawas') {
            return view('item.detailBarang', [
                'item' => $item,
            ]);
        }elseif ($hakAkses->role == 'unit') {
            return view('unit.itemDetail', [
                'item' => $item,
            ]);
        }
        return view('item.detailBarang', compact('item'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode)
    {
        $item = item::where('code',$kode)->get();
        $kategori = Kategori::all();

        return view('item.edit', [
            'item'=>$item,
            'kategori'=>$kategori
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('item')->where('kode', $request->code)->update([
            'name' => $request->name,
            'brand' => $request->brand,
            'unit' => $request->unit,
            'price' => $request->price,
            'stock' => $request->stock,
            'minimum_stock' => $request->stokmin,
            'category_id' => $request->category_id
        ]);


        return redirect()->route('item.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode)
    {
        DB::table('item')->where('code', $kode)->delete();
        return redirect()->route('item.list');
    }
}
