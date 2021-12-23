<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo("App\Models\Service");
    }

    // polymorphic relation to image table
    public function image()
    {
        return $this->morphOne("App\Models\Image", "imageable");
    }
}
