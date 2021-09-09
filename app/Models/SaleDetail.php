<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;
    protected $fillable = ['sale_id', 'product_id', 'product_name', 'product_price', 'quantity', 'status'];
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function adminSale()
    {
        return $this->belongsTo(AdminSale::class);
    }
}
