<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestItem extends Model
{
    use HasFactory;
    protected $table = 'permintaan';
    public $timestamps = false;

    public function getKodeRequestItem()
    {
        $date = Carbon::now()->format('dm');
        $user = RequestItem::count();

        if ($user == 0) {
            $antrian = 00001;
            $nomor = 'REQ-' .  sprintf('%05s', $antrian);
        } else {
            $last = RequestItem::all()->last();
            $urut = (int)substr($last->kode_permintaan, -5) + 1;

            $nomor = 'REQ-' . sprintf('%05s', $urut);
        }

        return $nomor;
    }
    public function materials()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id');
    }
    public function models()
    {
        return $this->belongsTo(ModelItem::class, 'model_id', 'kode_model_item');
    }
}
