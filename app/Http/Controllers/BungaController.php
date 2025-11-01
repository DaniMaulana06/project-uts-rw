<?php

namespace App\Http\Controllers;

use App\Models\Bunga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BungaController extends Controller
{
    /**
     * Display a listing of the resource for user view.
     */
    public function index(Request $request)
    {
        $query = Bunga::latest();

        // Filter berdasarkan kategori jika ada
        if ($request->has('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Filter berdasarkan pencarian jika ada
        if ($request->has('q')) {
            $search = $request->q;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('jenis', 'like', "%{$search}%");
            });
        }

        $bungas = $query->get();
        return view('user.produk', compact('bungas'));
    }

    /**
     * Display a listing of the resource for admin.
     */
    public function adminIndex()
    {
        $bungas = Bunga::latest()->paginate(10);
        return view('admin.bunga.index', compact('bungas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bunga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jenis' => 'required|string',
            'kategori' => 'required|in:bucket1,bucket_makanan',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $gambar = $request->file('gambar');
            $filename = $gambar->hashName();

            // Pastikan direktori ada
            Storage::makeDirectory('public/banner');

            // Upload gambar
            $path = $gambar->storeAs('public/banner', $filename);

            if (!$path) {
                throw new \Exception('Gagal menyimpan file gambar');
            }

            // Buat record baru di database
            Bunga::create([
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'kategori' => $request->kategori,
                'harga' => $request->harga,
                'gambar' => 'banner/' . $filename
            ]);

            return redirect()
                ->route('admin.bunga.index')
                ->with('success', 'Data bunga berhasil ditambahkan!');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['gambar' => 'Gagal mengupload gambar: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bunga = Bunga::findOrFail($id);
        return view('admin.bunga.edit', compact('bunga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $bunga = Bunga::findOrFail($id);

        $request->validate([
            'nama' => 'required|string',
            'jenis' => 'required|string',
            'kategori' => 'required|in:bucket1,bucket_makanan',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $updateData = [
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'kategori' => $request->kategori,
                'harga' => $request->harga
            ];

            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $filename = $gambar->hashName();

                // Pastikan direktori ada
                Storage::makeDirectory('public/banner');

                // Hapus gambar lama jika ada
                if ($bunga->gambar) {
                    Storage::delete('public/' . $bunga->gambar);
                }

                // Upload gambar baru
                $path = $gambar->storeAs('public/banner', $filename);

                if (!$path) {
                    throw new \Exception('Gagal menyimpan file gambar');
                }

                $updateData['gambar'] = 'banner/' . $filename;
            }

            $bunga->update($updateData);

            return redirect()
                ->route('admin.bunga.index')
                ->with('success', 'Data bunga berhasil diupdate!');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['gambar' => 'Gagal mengupload gambar: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bunga = Bunga::findOrFail($id);

        // Hapus gambar
        Storage::delete('public/' . $bunga->gambar);

        // Hapus data
        $bunga->delete();

        return redirect()
            ->route('admin.bunga.index')
            ->with('success', 'Data bunga berhasil dihapus!');
    }
}

