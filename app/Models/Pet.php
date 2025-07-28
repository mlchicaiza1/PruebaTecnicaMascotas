<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable=[
         'name', 'species', 'breed', 'age','temperament','origin',
         'image_url', 'person_id'
    ];

    public function person()
    {
      return $this->belongsTo(Person::class);
    }
}
