<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'name', 'price', 'category', 'stock'
    ];

    public function category() {
        return $this->belongsTo('App\category', 'category', 'id');
    }

    public function customer() {
        return $this->hasMany(customer::class, 'customer', 'id');
    }
}
