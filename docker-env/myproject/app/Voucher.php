<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = "voucher";
    protected $fillable = ["code"];

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }
}
