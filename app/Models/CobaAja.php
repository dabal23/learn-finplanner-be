<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CobaAja extends Model
{
    protected $fillable = [
        'name','category_id','price','note'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}