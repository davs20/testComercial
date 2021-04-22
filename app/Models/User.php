<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    
    protected $fillable = [
        'name',
        'nombre_usuario',
        'telefono',
        'promocion_tipo',
        'rol_id', 
        'email',
        'password',
    ];

    

    public function campanas()
    {
        return $this->belongsToMany('App\Models\CampanaMarketing', 'campana_marketing_users', 'user_id', 'campana_id');
    }

    public function promocion()
    {
        return $this->belongsTo('App\Models\Promocion', 'promocion_tipo', 'id');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id', 'id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
