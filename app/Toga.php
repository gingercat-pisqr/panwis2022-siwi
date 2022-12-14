<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toga extends Model
{
    // use Notifiable;
    protected $table = "togas";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','mahasiswa_id','size_toga', 'status'
        //,'no_wa','asal_daerah','nama_ayah','nama_ibu'
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
