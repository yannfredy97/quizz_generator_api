<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function chapters()
    {
      return $this->hasMany(Chapter::class);
    }

    public function level(){
      return $this->belongsTo(Level::class);      
    }

    public function subject(){
      return $this->belongsTo(Subject::class);      
    }
}
