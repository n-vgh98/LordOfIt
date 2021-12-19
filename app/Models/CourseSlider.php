<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSlider extends Model
{
    use HasFactory;

    // polymorphic relation to image table
    public function detail()
    {
        return $this->morphOne("App\Models\Image", "imageable");
    }
}
