<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVoucher extends Model
{
    protected $table = "product_voucher";
    protected $fillable = ["voucher_code","product_type","percent"];
}
