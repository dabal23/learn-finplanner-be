<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =[
        'name','type','note'
    ];

    public function spending_records(){
        return $this->hasMany(spending_records::class);
    }

    public function budget(){
        return $this->hasMany(Budget::class);
    }

    public function Income_records(){
        return $this->hasMany(IncomeRecord::class);
    }
}