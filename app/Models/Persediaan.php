<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    use HasFactory;
    protected $table = 'persediaan';
    public $timestamps = false;

    public function materials()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id');
    }
}
