<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    public $timestamps = false;

    public function getKodeCustomer()
    {
        $date = Carbon::now()->format('dm');
        $user = Customer::count();

        if ($user == 0) {
            $antrian = 00001;
            $nomor = 'CR-' .  sprintf('%05s', $antrian);
        } else {
            $last = Customer::all()->last();
            $urut = (int)substr($last->kode_customer, -5) + 1;

            $nomor = 'CR-' . sprintf('%05s', $urut);
        }

        return $nomor;
    }
}
