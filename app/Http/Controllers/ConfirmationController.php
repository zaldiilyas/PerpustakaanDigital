<?php

namespace App\Http\Controllers;

use App\Models\Peminjamans;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $peminjams = Peminjamans::select('peminjamans.*')
            ->join('users', 'peminjamans.user_id', '=', 'users.id')
            ->where('users.name', 'like', "%$keyword%")
            ->get();

        return view('dashboard.pinjaman.konfirmasiPinjaman', compact('peminjams', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjamans $peminjamans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjamans $peminjamans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $peminjams = Peminjamans::findOrFail($id);
        $peminjams->status_peminjaman = "terpinjam";

        $peminjams->save();

        return redirect()->back()->with('success', 'Buku Dikonfirmasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjamans $peminjamans)
    {
        //
    }
}
