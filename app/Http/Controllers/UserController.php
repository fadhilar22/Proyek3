<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donatur;
use App\Models\Dana;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  public function dashboard(Request $request)
  {
    $username = session('username');
    $nama = session('nama');
    $id = session('id');

    $data_profil = Donatur::where('username', $username)
      ->where('nama', $nama)
      ->first();

    if (!$data_profil) {
      return redirect()->route('masuk')->with('error', 'User not found');
    }

    $data_sedekah = Dana::where('id_donatur', $id)
      ->whereMonth('tanggal', now()->month)
      ->whereYear('tanggal', now()->year)
      ->sum('dana_masuk');

    // Fetch total sedekah data
    $data_sedekah_total = Dana::where('id_donatur', $id)
      ->sum('dana_masuk');

    return view('user.dashboard', compact('data_profil', 'data_sedekah', 'data_sedekah_total'));
  }

  public function updateProfile(Request $request)
  {
    $id = session('id');
    $validatedData = $request->validate([
      'nama' => 'required|string|max:255',
      'nohp' => 'required|string|max:15',
      'alamat' => 'required|string|max:255',
    ]);

    $donatur = Donatur::find($id);
    if (!$donatur) {
      return redirect()->back()->with('error', 'Donatur tidak ditemukan');
    }

    $donatur->nama = $validatedData['nama'];
    $donatur->no_hp = $validatedData['nohp'];
    $donatur->alamat = $validatedData['alamat'];

    if ($donatur->save()) {
      session()->forget('nama');
      session(['nama' => $validatedData['nama']]);
      return redirect()->route('user.dashboard')->with('success', 'Berhasil Update Data');
    } else {
      return redirect()->back()->with('error', 'Gagal mengupdate data');
    }
  }

  public function updateFoto(Request $request)
  {
    $request->validate([
      'foto_profil' => 'required|image|mimes:jpeg,png,gif|max:2048', // Ubah sesuai kebutuhan
    ]);

    $donatur = Donatur::find($request->id);
    if (!$donatur) {
      return redirect()->back()->with('error', 'Donatur tidak ditemukan');
    }

    $gambar_nama = $request->file('foto_profil')->getClientOriginalName();
    $gambar_temp = $request->file('foto_profil')->storeAs('public/userprofile', $gambar_nama);

    $donatur->foto_profil = $gambar_nama;

    if ($donatur->save()) {
      // Hapus gambar sebelumnya jika ada
      if ($request->has('gambar_lama')) {
        $gambar_lama = $request->input('gambar_lama');
        Storage::delete('public/userprofile/' . $gambar_lama);
      }

      return redirect()->route('user.dashboard')->with('success', 'Foto Profil berhasil diperbarui');
    } else {
      Storage::delete($gambar_temp); // Hapus gambar yang diupload karena update gagal
      return redirect()->back()->with('error', 'Gagal memperbarui Foto Profil');
    }
  }
}
