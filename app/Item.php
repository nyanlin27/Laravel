<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'codeno', 'name', 'photo', 'price', 'discount', 'description', 'brand_id', 'category_id',
    ];
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
}
