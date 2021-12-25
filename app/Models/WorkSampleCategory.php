<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkSampleCategory extends Model
{
    use HasFactory;

    public function samples()
    {
        return $this->hasMany("App\Models\WorkSample", "category_id");
    }

    // polymorphic relation to lang table
    public function language()
    {
        return $this->morphOne("App\Models\Lang", "langable");
    }
}
