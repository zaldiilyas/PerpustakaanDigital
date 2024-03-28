<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\User;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        
        if ($keyword) {
            $categories = categories::where('name', 'like', "%$keyword%")->get();
        } else {
            $categories = categories::all();
        }
        return view('dashboard.kategori.index', compact('categories', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kategori.tambahKategori');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        categories::create($validatedData);

        return redirect('/dataKategori')->with('success', 'Kategori Berhasil Ditambahkan');
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
    public function edit(categories $categories, $id)
    {
        return view('dashboard.kategori.editKategori', [
            'categories' => $categories->where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categories $categories, $id)
    {
        $rules = [
            'name' => 'required',
        ];

        $validatedData = $request->validate($rules);

        categories::where('id', $id)->update($validatedData);

        return redirect('/dataKategori')->with('success', 'Kategori Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categories $categories, $id)
    {
        $categories = categories::findOrFail($id);
        $categories->destroy($categories->id);
        return redirect()->back()->with('success', 'Kategori Berhasil Dihapus');
    }
}
