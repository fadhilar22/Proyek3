<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
<<<<<<< HEAD
use App\Models\Donatur;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string|in:user,admin',
        ]);

        $username = $request->input('username');
        $password = md5($request->input('password'));
        $role = $request->input('role');

        if ($role == 'user') {
            $user = Donatur::where(function ($query) use ($username) {
                $query->where('username', $username)
                      ->orWhere('email', $username);
            })->first();

            if ($user && $user->password === $password) {
                Auth::login($user);
                session(['role' => 'user']);
                session(['username' => $user->username]);
                session(['nama' => $user->nama]);
                session(['id' => $user->id]);
                return redirect()->route('user.dashboard')->with('success', 'Login Berhasil');
            } else {
                return redirect()->route('masuk')->with('error', 'Invalid username or password');
            }
        } else if ($role == 'admin') {
            $admin = Admin::where('username', $username)->first();

            if ($admin && $admin->password === $password) {
                Auth::login($admin);
                session(['role' => 'admin']);
                session(['username' => $admin->username]);
                session(['nama' => $admin->nama]);
                session(['id' => $admin->id]);
                return redirect()->route('admin.dashboard')->with('success', 'Login Berhasil');
            } else {
                return redirect()->route('masuk')->with('error', 'Invalid username or password');
            }
        }

        return redirect()->route('masuk')->with('error', 'Invalid role selected');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:donatur,email',
            'nama' => 'required|string|max:255',
            'nohp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:donatur,username',
            'password' => 'required|string|confirmed',
        ]);

        $email = $request->input('email');
        $nama = $request->input('nama');
        $nohp = $request->input('nohp');
        $alamat = $request->input('alamat');
        $username = $request->input('username');
        $password = md5($request->input('password'));

        $user = Donatur::create([
            'email' => $email,
            'nama' => $nama,
            'no_hp' => $nohp,
            'alamat' => $alamat,
            'username' => $username,
            'password' => $password,
        ]);

        if ($user) {
            return redirect()->route('masuk')->with('success', 'Akun baru berhasil dibuat! Silahkan Login.');
        } else {
            return redirect()->route('daftar')->with('error', 'Gagal membuat akun baru!');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('status', 'Logout Berhasil!');
=======
use App\Models\User;

class AuthController extends Controller
{
    public function soal($id_jenis, $id_subjenis)
    {
        $jenis_survey = JenisSurvey::find($id_jenis);
        $subjenis_survey = SubjenisSurvey::find($id_subjenis);
        $soal_surveys = SoalSurvey::where('id_subjenis', $id_subjenis)->orderBy('level')->get();

        $id_user = auth()->user()->id;

        $status_user = StatusUser::where('id_subjenis', $id_subjenis)
            ->where('id_user', $id_user)
            ->orderBy('level')
            ->get();

        $min_level = SoalSurvey::where('id_subjenis', $id_subjenis)->min('level');
        return view('users.soal', compact('subjenis_survey', 'jenis_survey', 'soal_surveys', 'status_user'));
>>>>>>> 6b45182347b3114a72dae2411280cc527fb7e407
    }
}
