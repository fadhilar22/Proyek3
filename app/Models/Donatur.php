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
    protected $table = 'donatur';
    protected $fillable = [
        'nama',
        'username',
        'password',
        'no_hp',
        'email',
        'alamat',
        'foto_profil'
    ];
}
