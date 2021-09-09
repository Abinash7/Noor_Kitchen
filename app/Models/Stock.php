<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['product_name', 'product_brand', 'quantity', 'rate','damaged_piece','category_id'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    use HasFactory;
}
