<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class spending_records extends Model
{
    protected $fillable = [
        'name','price','note','category_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
