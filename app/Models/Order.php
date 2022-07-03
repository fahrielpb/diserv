<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'kode_pos',
        'total_price',
        'ongkir',
        'status',
        'payment_status',
        'message',
        'tracking_no',
        'mid'
    ];

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
