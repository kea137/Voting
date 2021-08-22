<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Idea;

class Status extends Model
{
    use HasFactory;

    public function idea(){
        return $this->hasMany(Idea::class);
    }
}
