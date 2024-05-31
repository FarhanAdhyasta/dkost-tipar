<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class DashboardRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kamar.index',[
            'rooms'=>Room::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('dashboard.kamar.create', [
            'rooms' => Room::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // Lakukan validasi terlebih dahulu
    $validatedData = $request->validate([
        'kamar' => 'required|max:255',
        'radio' => 'required',
        'tipe' => 'required',
        'harga' => 'required',
        'fitur' => 'required',
        'image' => 'image|file|max:4096'
    ]);

    // Simpan gambar dan dapatkan pathnya
    $imagePath = $request->file('image')->store('post-images', 'public');

    // Tambahkan path gambar ke dalam data yang telah divalidasi
    $validatedData['image'] = $imagePath;

    // Buat entri di database dengan data yang telah divalidasi, termasuk path gambar
    Room::create([
        'nameroom' => $validatedData['kamar'],
        'slug' => Str::slug($validatedData['kamar']),
        'status' => $validatedData['radio'],
        'typeroom' => $validatedData['tipe'],
        'feature' => $validatedData['fitur'],
        'price' => $validatedData['harga'],
        'image' => $validatedData['image'] // Gunakan path gambar yang sudah disimpan
    ]);
    session()->flash('success', 'Kamar berhasil ditambahkan.');

    // Kembalikan respons setelah membuat entri di database
    return redirect('/dashboard/kamar');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($room)
    {
        $room = Room::where('slug',$room)->first();
        return view ('dashboard.kamar.edit', [
            'room' => $room
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $room)
{
    // Temukan kamar yang ingin diperbarui berdasarkan slug
    $room = Room::where('slug', $room)->first();

    // Simpan slug asli
    $originalSlug = $room->slug;

    // Validasi data yang dikirimkan
    $validatedData = $request->validate([
        'kamar' => 'required|max:255',
        'radio' => 'required',
        'tipe' => 'required',
        'harga' => 'required',
        'fitur' => 'required',
        'image' => 'image|file|max:4096'
    ]);

    // Jika ada perubahan pada nama kamar, perbarui slug
    if ($validatedData['kamar'] !== $room->nameroom) {
        // Buat slug baru dari nama kamar yang diperbarui
        $newSlug = Str::slug($validatedData['kamar']);
        
        // Cek apakah slug baru sudah digunakan oleh entri lain
        if (Room::where('slug', $newSlug)->where('id', '!=', $room->id)->exists()) {
            // Jika sudah digunakan, tambahkan postfix unik ke slug baru
            $newSlug = $newSlug . '-' . uniqid();
        }

        // Perbarui slug dengan slug baru
        $room->slug = $newSlug;
    }

    // Jika ada file gambar yang diunggah, simpan dan dapatkan pathnya
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($room->image) {
            Storage::delete($room->image);
        }
        
        $imagePath = $request->file('image')->store('post-images', 'public');
        // Tambahkan path gambar ke dalam data yang telah divalidasi
        $validatedData['image'] = $imagePath;
    } else {
        // Jika tidak ada file gambar yang diunggah, gunakan path gambar lama
        $validatedData['image'] = $room->image;
    }

    // Perbarui data kamar dengan data yang sudah divalidasi
    $room->update([
        'nameroom' => $validatedData['kamar'],
        'status' => $validatedData['radio'],
        'typeroom' => $validatedData['tipe'],
        'feature' => $validatedData['fitur'],
        'price' => $validatedData['harga'],
        'image' => $validatedData['image'] ?? $room->image // Gunakan path gambar yang sudah ada atau yang baru diunggah
    ]);
    session()->flash('edit', 'Kamar berhasil diperbarui.');

    return redirect('/dashboard/kamar');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($room)
    {
        $room = Room::where('slug',$room)->first();
        if ($room->image) {
            Storage::delete($room->image);
        }
        $room->delete();

        session()->flash('delete', 'Kamar berhasil dihapus.');
        return redirect('/dashboard/kamar');

    }

    // public function checkSlug(Request $request)
    // {
    //     $slug = SlugService::createSlug(Post::class, 'slug', $request->kamar);
    //     return response()->json(['slug'=>$slug]);
    // }
}
