<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukDetail extends Model
{
    use HasFactory;
    protected $table = 'produk_details';
    protected $primaryKey = 'id';
    protected $fillable = ['produk_id','harga'];
    
    public function produk()
    {
    	return $this->belongsTo(Produk::class);
    }

}
