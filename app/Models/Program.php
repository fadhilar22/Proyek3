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
    protected $table = 'program';
    protected $fillable = [
        'nama',
        'dana_masuk',
        'tanggal'
    ];
}
