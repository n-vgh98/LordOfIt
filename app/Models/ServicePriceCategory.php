<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePriceCategory extends Model
{
    use HasFactory;

    public function subcategories()
    {
        return $this->hasMany("App\Models\ServicePriceCategory", "parent_id");
    }

    public function category()
    {
        return $this->belongsTo("App\Models\ServicePriceCategory", "parent_id");
    }
}
