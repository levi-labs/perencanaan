<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Material;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaterialMasuk extends Model
{
    use HasFactory;
    protected $table = 'material_masuk';
    public $timestamps = false;

    public function materials()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id');
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
    public function getKodeMaterialMasuk()
    {
        $date = Carbon::now()->format('dm');
        $user = MaterialMasuk::count();

        if ($user == 0) {
            $antrian = 00001;
            $nomor = 'MTM-' .  sprintf('%05s', $antrian);
        } else {
            $last = MaterialMasuk::all()->last();
            $urut = (int)substr($last->kode_material_masuk, -5) + 1;

            $nomor = 'MTM-' . sprintf('%05s', $urut);
        }

        return $nomor;
    }
}
