<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function product() {
        return $this->hasMany('App\product', 'category', 'id');
    }
}
