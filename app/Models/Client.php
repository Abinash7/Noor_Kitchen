<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['client_name', 'client_address', 'contact_number','customer_vat'];
    use HasFactory;
}
