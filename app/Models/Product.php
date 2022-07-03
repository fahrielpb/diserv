<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'cate_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'qty',
        'tax',
        'size',
        'color',
        'status',
        'trending',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];


public function category()
{

    return $this->belongsTo(Category::class, 'cate_id', 'id');
}

// public function color()
// {

//     return $this->belongsTo(Color::class, 'colors_id', 'id');
// }

// public function size()
// {

//     return $this->belongsTo(Size::class, 'sizes_id', 'id');
// }


}
