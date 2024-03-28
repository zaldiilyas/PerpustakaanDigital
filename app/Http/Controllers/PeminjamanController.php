<?php

namespace App\Http\Controllers;

use App\Models\peminjamans;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pinjaman.index', [
            'peminjams' => peminjamans::with('user', 'book')->where('user_id', auth()->user()->id)->get()
        ]);
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
        $existingPeminjaman = peminjamans::where('user_id', $request->user_id)
                            ->where('book_id', $request->post_id)
                            ->first();
    
        if ($existingPeminjaman) {
            return redirect()->back()->with('error', 'Data peminjaman sudah ada.');
        } else {
            peminjamans::create([
                'user_id' => $request->user_id,
                'book_id' => $request->post_id,
                'tanggal_peminjam' => now(),
                'tanggal_pengembalian' => now()->addDays(3),
                'status_peminjaman' => $request->keterangan,
            ]);
        
            return redirect()->back()->with('success', 'Data peminjaman berhasil ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $peminjaman = Peminjamans::with('user', 'book')->findOrFail($id);
        return view('dashboard.pinjaman.detailPinjaman', [
            'peminjaman' => $peminjaman
        ]);
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
    public function destroy(peminjamans $peminjamans, $id)
    {
        $peminjams = peminjamans::findOrFail($id);
        $peminjams->destroy($peminjams->id);
        return redirect()->back()->with('success', 'Book has been cancled!');
    }
}
