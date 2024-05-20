<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjenisSurvey extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $table = 'riwayat';
    protected $fillable = [
        'id_donatur',
        'nama_donatur',
        'id_program',
        'nama_program',
        'nominal',
        'tanggal'
    ];
}
