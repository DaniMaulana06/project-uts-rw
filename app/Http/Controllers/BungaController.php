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
        $bunga = Bunga::paginate(6);

        // Filter berdasarkan kategori
        if ($request->has('kategori')) {
            $bunga->where('kategori', $request->kategori);
        }

        // Filter pencarian
        if ($request->filled('q')) {
            $bunga->where('jenis', 'like', '%' . $request->q . '%');
        }

        return view('user.produk', compact('bunga'));
    }

    /**
     * Display a listing of the resource for admin.
     */
    public function adminIndex()
    {
        $bunga = Bunga::latest()->paginate(5);
        return view('admin.bunga.index', compact('bunga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Bunga::getKategoriList();
        return view('admin.bunga.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kategoriList = array_keys(Bunga::getKategoriList());
        $request->validate([
            'jenis' => 'required|string',
            'kategori' => 'required|in:' . implode(',', $kategoriList),
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            // Ambil file gambar
            $gambar = $request->file('gambar');

            // Simpan otomatis ke storage/app/public/images
            // Laravel akan menamai file secara unik
            $path = $gambar->store('images', 'public');

            if (!$path) {
                throw new \Exception('Gagal menyimpan file gambar');
            }

            // Simpan data ke database
            Bunga::create([
                'jenis' => $request->jenis,
                'kategori' => $request->kategori,
                'harga' => $request->harga,
                'gambar' => $path,
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
        $kategoriList = array_keys(Bunga::getKategoriList());
        $bunga = Bunga::findOrFail($id);
        return view('admin.bunga.edit', compact('bunga', 'kategoriList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kategoriList = array_keys(Bunga::getKategoriList());
        $bunga = Bunga::findOrFail($id);

        $request->validate([
            'jenis' => 'required|string',
            'kategori' => 'required|in:' . implode(',', $kategoriList),
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            $updateData = [
                'jenis' => $request->jenis,
                'kategori' => $request->kategori,
                'harga' => $request->harga,
            ];

            // Jika user upload gambar baru
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $filename = $gambar->hashName();

                // Hapus gambar lama jika ada
                if ($bunga->gambar && Storage::exists('public/' . $bunga->gambar)) {
                    Storage::delete('public/' . $bunga->gambar);
                }

                // Upload gambar baru ke public/images
                $path = $gambar->storeAs('public/images', $filename);

                if (!$path) {
                    throw new \Exception('Gagal menyimpan file gambar baru');
                }

                $updateData['gambar'] = 'images/' . $filename;
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

        // Hapus gambar jika ada
        if ($bunga->gambar && Storage::exists('public/' . $bunga->gambar)) {
            Storage::delete('public/' . $bunga->gambar);
        }

        // Hapus data dari database
        $bunga->delete();

        return redirect()
            ->route('admin.bunga.index')
            ->with('success', 'Data bunga berhasil dihapus!');
    }
}
