<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = ["check_date","total_price","customer_phone","customer_address","status"];

    public function user()
    {
        return $this->belongsTo(User::class, "customer_phone", "phone_number");
    }
}
