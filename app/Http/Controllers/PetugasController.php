<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        
        if ($keyword) {
            $officers = User::where('name', 'like', "%$keyword%")
                            ->where('level', 'petugas', "%$keyword%")
                            ->get();
        } else {
            $officers = User::where('level', "petugas")->get();
        }
        return view('dashboard.petugas.index', compact('officers', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.petugas.tambahPetugas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' =>'required|min:5|max:255'
        ]);
        
        $validatedData['level'] = "petugas";

        User::create($validatedData);

        return redirect('/dataPetugas')->with('success', 'Petugas Berhasil Ditambahkan');
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
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        $user = User::findOrFail($id);
        $user->destroy($user->id);
        return redirect()->back()->with('success', 'Petugas Berhasil Dihapus');
    }
}
