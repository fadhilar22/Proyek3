<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
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
    }
}
