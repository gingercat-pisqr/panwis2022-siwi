<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persembahan extends Model
{
    // use Notifiable;
    protected $table = "persembahans";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','mahasiswa_id','nama_tim', 'nama_pj', 'npm_pj', 'line_pj', 'jenis_persembahan', 'wa_pj', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
