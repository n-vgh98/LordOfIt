<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $table = "services_categories";


    public function services(){
        return $this->hasMany("App\Models\Service_Category");
    }
}
