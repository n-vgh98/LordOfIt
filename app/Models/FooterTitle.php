<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterTitle extends Model
{
    use HasFactory;
    public function contents()
    {
        return $this->hasMany("App\Models\FooterContent");
    }
}
