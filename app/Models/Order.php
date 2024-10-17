<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'aksesorises', 'name_customer', 'total_price'];
    protected $casts = [
        'aksesorises' => 'array'
    ];
}
