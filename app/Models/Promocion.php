<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Promocion extends Model implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'promociones';

    protected $fillable = [
        'id',
        'nombre',
    ];


    public function users()
    {
        return $this->hasMany('App\Models\User', 'promocion_tipo', 'id');
    }


    
}
