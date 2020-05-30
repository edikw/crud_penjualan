<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $fillable = [
        'customer', 'product'
    ];

    public function product() {
        return $this->BelongsTo(product::class, 'product', 'id');
    }

    public function customer() {
        return $this->BelongsTo(customer::class, 'customer', 'id');
    }

}
