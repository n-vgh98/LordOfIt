<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePrice extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo("App\Models\ServicePriceCategory", "category_id");
    }

    // polymorphic relation to lang table
    public function language()
    {
        return $this->morphOne("App\Models\Lang", "langable");
    }
}
