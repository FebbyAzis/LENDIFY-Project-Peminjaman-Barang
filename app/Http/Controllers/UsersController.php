<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pinjaman;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = $user->id;
        $pinjamanAktif = Pinjaman::where('users_id', $users)->where('status_pinjaman', 1)->count('id');
        $pinjamanSelesai = Pinjaman::where('users_id', $users)->where('status_pinjaman', 2)->count('id');
       
        return view('users.dashboard', compact('user','users','pinjamanAktif', 'pinjamanSelesai'));
    }

    public function barang()
    {
        $user = Auth::user();
        $users = $user->id;
        $barangs = Barang::with(['pinjaman' => function ($query) {
            $query->where('status_pinjaman', 1); // Hanya mengambil data pinjaman dengan status_pinjaman = 1
        }])->get();

        $b = $barangs->map(function ($barang) {
            $totalDipinjam = $barang->pinjaman->sum('stok');
            $totalPinjaman = $barang->pinjaman->sum('jumlah_pinjaman');
            
            return [
                'id' => $barang->id,
                'nama_barang' => $barang->nama_barang,
                'kategori' => $barang->kategori,
                'kode_barang' => $barang->kode_barang,
                'stok' => $barang->stok,
                'stok_dipinjam' => $totalDipinjam,
                'stok_tersisa' => $barang->stok - $totalPinjaman,
                'total_pinjaman' => $totalPinjaman
            ];
        });
        return view('users.barang', compact('user','users','b'));
    }

    public function pinjaman()
    {
        $user = Auth::user();
        $users = $user->id;
        $p = Pinjaman::where('users_id', $users)->orderBy('id', 'desc')->get();
        $pA = Pinjaman::where('users_id', $users)->where('status_pinjaman', 1)->orderBy('id', 'desc')->get();
        $pS = Pinjaman::where('users_id', $users)->where('status_pinjaman', 2)->orderBy('id', 'desc')->get();
        return view('users.pinjaman',compact('user','users', 'pA', 'pS', 'p'));
    }

    public function buat_pinjaman(Request $request)
    {
        $save = new Pinjaman;
        $save->users_id = $request->users_id;
        $save->barang_id = $request->barang_id;
        $save->jumlah_pinjaman = $request->jumlah_pinjaman;
        $save->tgl_pinjaman = $request->tgl_pinjaman;
        $save->tgl_pengembalian = $request->tgl_pengembalian;
        $save->save(); 

        return redirect()->back()->with('Success', 'Barang berhasil dipinjam!');
    }

    public function pengembalian(Request $request, $id)
    {

        Pinjaman::where('id', $id)->update([
            
        'tgl_pengembalian' => $request->tgl_pengembalian,
        'status_pinjaman' => $request->status_pinjaman,

        ]);

        return redirect()->back()->with('pengembalian', 'Barang berhasil dikembalikan');
    }

    public function profil()
    {
        $user = Auth::user();
        $users = $user->id;
        return view('users.profil', compact('user', 'users'));
    }

    public function edit_profil(Request $request, $id)
    {

        Users::where('id', $id)->update([
            
        'nama_depan' => $request->nama_depan,
        'nama_belakang' => $request->nama_belakang,
        'name' => $request->name,
        'email' => $request->email,
        'no_tlp' => $request->no_tlp,
        ]);

        return redirect()->back()->with('Successs', 'Data berhasil diubah');
    }
}
