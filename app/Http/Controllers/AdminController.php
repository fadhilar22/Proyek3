<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Donatur;
use App\Models\Dana;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
  public function dashboard()
  {
    $username = session('username');
    // Mendapatkan data admin berdasarkan session username
    $data_profil = Admin::where('username', $username)->first();

    if (!$data_profil) {
      return redirect()->route('login.form')->with('error', 'Admin tidak ditemukan');
    }

    $user_tampil = Donatur::select('donatur.id', 'donatur.nama', 'donatur.username', 'donatur.foto_profil', 'donatur.no_hp', 'donatur.alamat', DB::raw('COALESCE(SUM(dana.dana_masuk), 0) as jml'))
      ->leftJoin('dana', 'donatur.id', '=', 'dana.id_donatur')
      ->whereMonth('dana.tanggal', now()->month)
      ->whereYear('dana.tanggal', now()->year)
      ->orWhereNull('dana.id_donatur')
      ->groupBy('donatur.id')
      ->groupBy('donatur.nama')
      ->groupBy('donatur.username')
      ->groupBy('donatur.foto_profil')
      ->groupBy('donatur.no_hp')
      ->groupBy('donatur.alamat')
      ->first()
      ->toArray();

    $list_user = Donatur::get()->toArray();

    $jml_user = Donatur::count();

    // Redirect ke halaman admin.dashboard dengan data admin
    return view('admin.dashboard', compact('data_profil', 'user_tampil', 'list_user', 'jml_user'));
  }
  public function dashboardSelected(Request $request)
  {
    $username = session('username');
    // Mendapatkan data admin berdasarkan session username
    $data_profil = Admin::where('username', $username)->first();

    if (!$data_profil) {
      return redirect()->route('login.form')->with('error', 'Admin tidak ditemukan');
    }

    $selectedId = $request->input('id');

    $user_all = Donatur::select('donatur.id', 'donatur.nama', 'donatur.username', 'donatur.foto_profil', 'donatur.no_hp', 'donatur.alamat', DB::raw('COALESCE(SUM(dana.dana_masuk), 0) as jml'))
      ->leftJoin('dana', 'donatur.id', '=', 'dana.id_donatur')
      ->whereMonth('dana.tanggal', now()->month)
      ->whereYear('dana.tanggal', now()->year)
      ->orWhereNull('dana.id_donatur')
      ->groupBy('donatur.id')
      ->groupBy('donatur.nama')
      ->groupBy('donatur.username')
      ->groupBy('donatur.foto_profil')
      ->groupBy('donatur.no_hp')
      ->groupBy('donatur.alamat')
      ->get()
      ->toArray();

    foreach ($user_all as $user) {
      if ($user['id'] == $selectedId) {
        $user_tampil = $user;
        break;
      }
    }

    $list_user = Donatur::get()->toArray();

    $jml_user = Donatur::count();

    // Redirect ke halaman admin.dashboard dengan data admin
    return view('admin.dashboard', compact('data_profil', 'user_tampil', 'list_user', 'jml_user'));
  }
  public function sedekah(Request $request)
  {
    $idDonatur = $request->input('id');
    $jumlah = $request->input('jumlah');

    $sedekah = Dana::create([
      'id_donatur' => $idDonatur,
      'dana_masuk' => $jumlah
    ]);

    if ($sedekah) {
      return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    } else {
      return redirect()->back()->with('error', 'Gagal Menambahkan Data');
    }
  }
}
