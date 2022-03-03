<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = ['users_id','payout_id'];

    public function payout()
    {
    	return $this->belongsTo(Payouts::class, 'payout_id');
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
