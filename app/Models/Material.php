<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    use HasFactory;

    protected $table = 'material';
    public $timestamps = false;

    public function getKodeMaterial()
    {
        $date = Carbon::now()->format('dm');
        $user = Material::count();

        if ($user == 0) {
            $antrian = 00001;
            $nomor = 'MT-' .  sprintf('%05s', $antrian);
        } else {
            $last = Material::all()->last();
            $urut = (int)substr($last->kode_material, -5) + 1;

            $nomor = 'MT-' . sprintf('%05s', $urut);
        }

        return $nomor;
    }
    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
    public function materials()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id');
    }
}
