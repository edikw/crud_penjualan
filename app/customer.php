<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable = [
        'name', 'address', 'email', 'password'
    ];

    public function transaction() {
        return $this->belongsTo(transaction::class, 'id');
    }
}
