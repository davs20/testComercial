<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampanaMarketing extends Model
{
    use HasFactory;

    protected $table = 'campana_marketing';

    protected $fillable = [
        'id',
        'nombre',
    ];
}
