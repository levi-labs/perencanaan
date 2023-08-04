<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelItem extends Model
{
    use HasFactory;
    protected $table = 'model_item';
    public $timestamps = false;

    public function getKodeModelItem()
    {
        $date = Carbon::now()->format('dm');
        $user = ModelItem::count();

        if ($user == 0) {
            $antrian = 00001;
            $nomor = 'MDL-' .  sprintf('%05s', $antrian);
        } else {
            $last = ModelItem::all()->last();
            $urut = (int)substr($last->kode_model_item, -5) + 1;

            $nomor = 'MDL-' . sprintf('%05s', $urut);
        }

        return $nomor;
    }

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    public function materials()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id');
    }
}
