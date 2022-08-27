<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','gender','phone'];

    // Customer's Phone Number
    public function phone() {
    	return $this->hasOne(Phone::class);
    }
}
