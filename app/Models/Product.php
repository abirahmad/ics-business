<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
	
    protected $fillable = [
        'title',
        'slug',
        'f_thumbnail',
        'description',
        'sale_price',
        'stock_qty',
        'user_id',
    ];

    public function seller(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class,'item_id');
    }
}
