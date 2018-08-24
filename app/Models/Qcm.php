<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qcm extends Model
{

    protected $fillable = ['chapter_id','question','answer_1','answer_2','answer_3','answer_4','answer_5','answer_6',
    'answer_7','answer_8','answer_9','correct_answers','image_filename'];
    public function chapter()
    {
      return $this->belongsTo(Chapter::class);
    }
}
