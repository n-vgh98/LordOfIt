<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'about_us';

     // polymorphic relation to image table
     public function image()
     {
         return $this->morphOne("App\Models\Image", "imageable");
     }
}
