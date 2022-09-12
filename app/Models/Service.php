<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['service_name','service_category','service_charges'];


    // Service's Category
    public function category() {
    	// return $this->hasOne(Category::class,'category_name','service_category');
        return $this->belongsTo('App\Models\Category','service_category','category_name');
    }
}
