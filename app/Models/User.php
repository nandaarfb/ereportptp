<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';
    protected $fillable = [
        'NIPP', 'NAMA', 'ID_JABATAN', 'KELAS', 'PASSWORD', 'TIPE', 'ACCESS', 'photo', 'STATUS', 'TGL_PENSIUN', 'ENCPASS'
    ];
    protected $primaryKey = 'ID';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'PASSWORD', 'ENCPASS'
    ];

    public function getAuthPassword()
    {
        return $this->PASSWORD;
    }
}