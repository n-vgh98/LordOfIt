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

    public function services()
    {
        return $this->hasMany("App\Models\ServicePrice", "category_id");
    }

    // polymorphic relation to lang table
    public function language()
    {
        return $this->morphOne("App\Models\Lang", "langable");
    }
}
