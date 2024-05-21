<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Donatur extends Authenticatable
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
