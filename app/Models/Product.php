<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    protected $fillable = [
        'name',
        'qty',
        'price',
        'user_id',
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'product_id');
    }
}
