<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $fillable = ["code","branch","type","sex","size","status","image","price"];

    public function voucher()
    {
        return $this->belongsToMany(Voucher::class);
    }
}
