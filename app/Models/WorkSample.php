<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkSample extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo("App\Models\WorkSampleCategory", "category_id");
    }
    public function image()
    {
        return $this->morphOne("App\Models\Image", "imageable");
    }

    // polymorphic relation to lang table
    public function language()
    {
        return $this->morphOne("App\Models\Lang", "langable");
    }
}
