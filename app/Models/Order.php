<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        // 'total_price',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'provinsi',
        'kecamatan',
        'kelurahan',
        'kode_pos',
        'status',
        'message',
        'tracking_no',
    ];

}
