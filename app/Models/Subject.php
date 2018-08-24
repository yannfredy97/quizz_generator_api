<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function levels()
    {
      return $this->belongsToMany(Level::class, 'courses');
    }
}
