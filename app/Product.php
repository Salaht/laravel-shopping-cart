<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['imagePath', 'title', 'description', 'price'];

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }
}
