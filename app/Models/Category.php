<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use SoftDeletes;

    protected $fillable = 
    [
        'name'
    ];

    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }
}
