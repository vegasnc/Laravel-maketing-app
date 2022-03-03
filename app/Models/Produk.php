<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $primaryKey = 'id';
    protected $fillable = ['users_id','nama_produk','qty','jenis','bv'];
    protected $hidden = ['created_at','updated_at'];

    public function users()
    {
    	return $this->belongsTo(User::class);
	}

    public function detail()
    {
    	return $this->hasMany(ProdukDetail::class);
	}
    
    public function payout()
    {
        return $this->belongsTo(Payouts::class);
    }
}
