<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('amount');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
