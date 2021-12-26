<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function imageable()
    {
        return $this->morphTo();
    }

    // polymorphic relation to lang table
    public function language()
    {
        return $this->morphOne("App\Models\Lang", "langable");
    }
}
