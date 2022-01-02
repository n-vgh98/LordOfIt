<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public function users(){
        return $this->belongsToMany(User::class);
    }

    // polymorphic relation to image table
    public function image()
    {
        return $this->morphOne("App\Models\Image", "imageable");
    }

    // polymorphic relation to lang table
    public function lang()
    {
        return $this->morphOne("App\Models\Lang", "langable");
    }
    public function comments()
    {
        return $this->morphMany("App\Models\Comment", "commentable");
    }
}
