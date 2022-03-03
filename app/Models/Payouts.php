<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payouts extends Model
{
    use HasFactory;
    protected $table = 'payouts';
    protected $primarykey = 'id';
    protected $fillable = ['no_transaksi','nama_produk','qty'];

    public function produk()
    {
    	return $this->hasMany(Produk::class);
    }

    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class, 'payout_id');
    }
    
    // public function user()
    // {
    // 	return $this->hasMany('App\Models\User');
    // }
}
