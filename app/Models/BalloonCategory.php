<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Balloon;

class BalloonCategory extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function balloons(){
        return $this->hasMany(Balloon::class, 'category_id');
    }
}
