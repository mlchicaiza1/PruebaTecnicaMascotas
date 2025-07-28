<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

     protected $table = 'persons';

    protected $fillable=[
        'name', 'email', 'birth_date', 'address', 'phone'
    ];

    public function pets(){
        return $this->hasMany(Pet::class);
    }
}
