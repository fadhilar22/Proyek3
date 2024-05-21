<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class Riwayat extends Model
=======
class SubjenisSurvey extends Model
>>>>>>> 6b45182347b3114a72dae2411280cc527fb7e407
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
