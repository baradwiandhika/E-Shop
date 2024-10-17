<?php

namespace App\Http\Controllers;

use App\Models\Aksesoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

class AccessoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Request $request -> mengambil data dari form nya (di php sebelumnya : $_POST/$_GET)
    public function index(Request $request)
    {
        // appends : menambahkan/membawa request pagination (data-data pagination tidak berubah meskipun ada request)
        $aksesoris = Aksesoris::where('name', 'LIKE', '%' . $request->cari . '%')->simplePaginate(5)->appends($request->all());
        // compact() -> mengirimkan data ($) agar data $nya bisa dipake di blade
        return view('pages.produk_aksesoris', compact('aksesoris'));

        $aksesoris = Aksesoris::paginate(10); 
        return view('produk_aksesoris.index', compact('aksesoris'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Aksesoris::create($request->all());


        return redirect()->route('produk_aksesoris.data')->with('success', 'Berhasil Menambah Data Obat!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Aksesoris $aksesoris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aksesoris = Aksesoris::find($id);
        return view('medicine.edit', compact('aksesoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        Aksesoris::where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('produk_aksesoris.data')->with('success', 'Berhasil Mengedit Data Obat!');
    }


    public function destroy($id)
    {
        $item = Aksesoris::find($id);

        if ($item) {
            $item->delete();
            return redirect()->route('produk_aksesoris.index')->with('success', 'Item berhasil dihapus.');
        }

        return redirect()->route('produk_aksesoris.index')->with('error', 'Item tidak ditemukan.');
    }
}