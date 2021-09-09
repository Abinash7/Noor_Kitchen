<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSale extends Model
{
    protected $fillable = ['user_id', 'user_name', 'vehicle_number', 'customer_name', 'customer_number', 'total_price', 'total_received', 'change', 'sale_status', 'customer_vat'];
    public function saleDetails()
    {
        return $this->hasMany(AdminSaleDetails::class);
    }
    use HasFactory;
}
