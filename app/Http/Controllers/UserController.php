<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Request $request -> mengambil data dari form nya (di php sebelumnya : $_POST/$_GET)
    public function index(Request $request)
    {
        $orderBy = $request->sort_stock ? 'stock' : 'name';
        // appends : menambahkan/membawa request pagination (data-data pagination tidak berubah meskipun ada request)
        $aksesoris = User::where('name', 'LIKE', '%'.$request->cari.'%')->orderBy($orderBy, 'ASC')->simplePaginate(5)->appends($request->all());
        // compact() -> mengirimkan data ($) agar data $nya bisa dipake di blade
        return view('pages.kelola_akun', compact('aksesoris',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'unique:users,email',
        ]);

        $password = Str::random(10);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($password),
        ]);


        return redirect()->route('kelola_akun.data')->with('success', 'Berhasil Menambah Pengguna');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('account.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validasi input dari request
    $request->validate([
        'name' => 'required|max:100',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => "required"

    ]);

    // Update pengguna dengan data baru
    User::where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password), 

    ]);

    return redirect()->route('kelola_akun.data')->with('success', 'Berhasil Mengedit Data Pengguna!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data Obat!');

    }
}
