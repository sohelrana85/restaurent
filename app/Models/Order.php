<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['order_no','user_id','name','phone','shipping_address','sub_total'];

    public function pay_status()
    {
        return $this->hasOne(PaymentMethod::class);
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function delivery_status()
    {
        return $this->hasOne(OrderDelivery::class);
    }
}
