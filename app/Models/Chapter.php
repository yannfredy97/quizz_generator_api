<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{

    protected $fillable = ['title','course_id'];
  
    public function qcms()
    {
      return $this->hasMany(Qcm::class);
    }

    public function course()
    {
      return $this->belongsTo(Course::class);
    }
}
