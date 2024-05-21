<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
<<<<<<< HEAD
use Illuminate\Foundation\Auth\User as Authenticatable;

class Donatur extends Authenticatable
=======
use Illuminate\Database\Eloquent\Model;

class SubjenisSurvey extends Model
>>>>>>> 6b45182347b3114a72dae2411280cc527fb7e407
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
