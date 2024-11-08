<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income_record extends Model
{
    protected $fillable = [
        'name','amount','note','category_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
