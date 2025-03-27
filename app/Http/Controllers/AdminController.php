<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use App\Models\Pinjaman;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Users::count('id');
        $barang = Barang::count('id');
        $stok = Barang::sum('stok');
        $pinjaman = Pinjaman::where('status_pinjaman', 1)->sum('jumlah_pinjaman');
        return view('admin.dashboard', compact('user', 'barang', 'stok', 'pinjaman'));
    }

    public function barang()
    {
        $barangs = Barang::with('pinjaman')->get();

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

        return view('admin.barang', compact('b'));
    }

    public function tambah_barang(Request $request)
    {
        $save = new Barang;
        $save->nama_barang = $request->nama_barang;
        $save->kategori = $request->kategori;
        $save->kode_barang = $request->kode_barang;
        $save->stok = $request->stok;
        $save->save(); 

        return redirect()->back()->with('Success', 'Data berhasil disimpan!');
    }

    public function edit_barang(Request $request, $id)
    {

        Barang::where('id', $id)->update([
            
        'nama_barang' => $request->nama_barang,
        'kategori' => $request->kategori,
        'kode_barang' => $request->kode_barang,
        'stok' => $request->stok,

        ]);

        return redirect()->back()->with('Successs', 'Data berhasil diubah');
    }

    public function hapus_barang($id)
    {
        $b = Barang::where('id', $id)->delete();
        return redirect()->back()->with('Successss', 'Data berhasil dihapus!');
    }

    public function detail_barang($id)
    {
        $user = Auth::user();
        
        $b = Barang::find($id);
        $p = Pinjaman::where('barang_id', $id)->orderBy('id', 'desc')->get();
        $total = Pinjaman::where('barang_id', $id)->sum('jumlah_pinjaman');

        return view('admin.detail_barang', compact('user', 'b', 'p', 'total'));
    }

    public function pengembalian(Request $request, $id)
    {

        Pinjaman::where('id', $id)->update([
            
        'tgl_pengembalian' => $request->tgl_pengembalian,
        'status_pinjaman' => $request->status_pinjaman,

        ]);

        return redirect()->back()->with('pengembalian', 'Barang berhasil dikembalikan');
    }

    public function pinjaman()
    {
        $user = Auth::user();
        $users = $user->id;
        $p = Pinjaman::orderBy('id', 'desc')->get();
        $pA = Pinjaman::where('status_pinjaman', 1)->orderBy('id', 'desc')->get();
        $pS = Pinjaman::where('status_pinjaman', 2)->orderBy('id', 'desc')->get();
        return view('admin.pinjaman',compact('user','users', 'pA', 'pS', 'p'));
    }

    public function profil()
    {
        $user1 = Users::orderBy('id', 'desc')->get();
        $user = Auth::user();
        $users = $user->id;
        return view('admin.data_users', compact('user', 'users', 'user1'));
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
