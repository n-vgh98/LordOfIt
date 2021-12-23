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
}
