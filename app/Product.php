<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Product extends Model
{

    use HasTags;

    protected $guarded = [];


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
