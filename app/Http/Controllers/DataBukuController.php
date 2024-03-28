<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $keyword = $request->input('keyword');
        
        if ($keyword) {
            $books = Books::where('judul', 'like', "%$keyword%")->get();
        } else {
            $books = Books::with('category')->get();
        }
        return view('dashboard.buku.index', compact('books', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.buku.tambahBuku', [
            'categories' => categories::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'categories_id' => 'required',
            'image' => 'image|file|max:1024',
            'isi' => 'required',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tahunTerbit' => 'required|max:255',
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('book-images', 'public');
        }

        Books::create($validatedData);

        return redirect('/dataBuku')->with('success', 'Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $books, Request $request)
    {
        return view('dashboard.buku.detailBuku', [
            'books' => Books::where('id', $request->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $books, $id)
    {
        return view('dashboard.buku.editBuku', [
            'book' => $books->where('id', $id)->first(),
            'categories' => categories::all()
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'judul' => 'required|max:255',
            'categories_id' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunTerbit' => 'required',
            'image' => 'image|file|max:1024',
            'isi' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('book-images', 'public');
        }

        Books::where('id', $id)->update($validatedData);

        return redirect('/dataBuku')->with('success', 'Buku Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $books, $id)
    {
        $books = Books::findOrFail($id);
        $books->destroy($books->id);
        return redirect()->back()->with('success', 'Buku Berhasil Dihapus');
    }
}
