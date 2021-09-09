<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSaleDetails extends Model
{
    protected $fillable = ['sale_id', 'product_id', 'product_name', 'product_price', 'quantity', 'status'];
    
    public function adminSale()
    {
        return $this->belongsTo(AdminSale::class);
    }
    use HasFactory;
}
