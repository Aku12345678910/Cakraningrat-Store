<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; // Pastikan Anda memiliki model Produk
use App\Models\Kategori; // Pastikan Anda memiliki model Kategori

class ProductController extends Controller
{
    // Menampilkan halaman utama produk
    public function index(Request $request)
    {
        $queryKategori = Kategori::all(); // Mengambil semua kategori

        // Pencarian berdasarkan keyword
        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $queryProduk = Produk::where('nama', 'LIKE', '%' . $keyword . '%')->get();
        } 
        // Pencarian berdasarkan kategori
        elseif ($request->has('kategori')) {
            $kategori = $request->input('kategori');
            $kategoriId = Kategori::where('nama', $kategori)->first();

            if ($kategoriId) {
                $queryProduk = Produk::where('kategori_id', $kategoriId->id)->get();
            } else {
                $queryProduk = Produk::all(); // Jika kategori tidak ditemukan, ambil semua produk
            }
        } 
        // Jika tidak ada filter
        else {
            $queryProduk = Produk::all(); // Ambil semua produk
        }

        $countData = $queryProduk->count(); // Menghitung jumlah data produk

        return view('produk', compact('queryKategori', 'queryProduk', 'countData'));
    }

    // Menampilkan detail produk
    public function show(Request $request)
    {
        $nama = htmlspecialchars($request->query('nama'));
        $produk = Produk::where('nama', $nama)->firstOrFail(); // Mengambil produk berdasarkan nama

        $produkTerkait = Produk::where('kategori_id', $produk->kategori_id)
            ->where('id', '!=', $produk->id)
            ->limit(4)
            ->get();

        return view('produk-detail', compact('produk', 'produkTerkait'));
    }
}