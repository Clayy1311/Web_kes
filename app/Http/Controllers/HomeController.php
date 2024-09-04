<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Redirect; // Import Redirect
use Illuminate\Support\Facades\Storage; // Import Storage
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();
        $request->image->storeAs('public', $imageName);
    
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'slug' =>$request->slug,
            'image' => $imageName,
            'author' => $request->author,
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Artikel added successfully.');
    }
    public function delete_artikel($id)
    {
        $deleted = DB::table('articles')->where('id', $id)->delete();
     return redirect()->route('dashboard')->with('success', 'Artikel added successfully.');
    }
    public function update_artikel(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            'body' => 'required',

             // aturan validasi untuk gambar
            // tambahkan aturan validasi lainnya untuk field lainnya
        ]);
    
        // Simpan gambar ke server dan dapatkan nama file
        if ($request->hasFile('image')) {
            $gambar = $request->file('image');
            $nama_file = time() . '_' . \Illuminate\Support\Str::limit($gambar->getClientOriginalName(), 191); // Batasi panjang nama file agar sesuai dengan tipe data kolom 'image'
            $gambar->move(public_path('storage'), $nama_file); // Simpan gambar di direktori penyimpanan yang sesuai
        }
    
        // Update data artikel dalam database
        $affected = DB::table('articles')
            ->where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'author' => $request->input('author'),
                'slug' => $request->input('slug'),
                'image' => $nama_file ?? null, // Simpan nama file gambar dalam kolom image atau null jika tidak ada gambar yang diunggah
                // tambahkan kolom lainnya yang ingin Anda update
            ]);
    
        if ($affected) {
            return redirect()->route('dashboard')->with('success', 'Artikel berhasil diupdate.');
        } else {
            return redirect()->route('articles.index')->with('error', 'Artikel tidak ditemukan.');
        }
    }
    
}