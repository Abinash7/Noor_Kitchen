<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'user_name', 'vehicle_number', 'customer_name', 'customer_number', 'total_price', 'total_received', 'change', 'sale_status','payment_type'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return Carbon::instance($date)
            ->format('Y-m-d');
    }

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }
}
