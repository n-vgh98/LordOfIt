<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $table = "services_categories";


    public function services(){
        return $this->hasMany("App\Models\Service");
    }

    public function subcategories()
    {
        return $this->hasMany("App\Models\ServiceCategory", "parent_id");
    }

    public function category()
    {
        return $this->belongsTo("App\Models\ServiceCategory", "parent_id");
    }

    // polymorphic relation to lang table
    public function language()
    {
        return $this->morphOne("App\Models\Lang", "langable");
    }
}
