<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpendingRecord extends Model
{
    protected $fillable = [
        'name','price','note','category_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
