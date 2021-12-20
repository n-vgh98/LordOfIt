<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function writer()
    {
        return $this->belongsTo("App\Models\User", "writer_id");
    }

    public function answers()
    {
        return $this->hasMany("App\Models\Comment", "parent_id");
    }

    public function genesis()
    {
        return $this->belongsTo("App\Models\Comment", "parent_id");
    }
}
