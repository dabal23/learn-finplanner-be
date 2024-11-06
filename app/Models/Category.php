<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =[
        'name','type'
    ];

    public function spending_records(){
        return $this->hasMany(spending_records::class);
    }

    public function budget(){
        return $this->hasMany(budget::class);
    }

    public function Income_record(){
        return $this->hasMany(Income_record::class);
    }
}