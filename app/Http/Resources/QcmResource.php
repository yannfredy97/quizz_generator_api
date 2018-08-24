<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QcmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'chapter' => new ChapterResource($this->chapter),
            'question' => $this->question,
            'answer_1' => $this->answer_1,
            'answer_2' => $this->answer_2,
            'answer_3' => $this->answer_3,
            'answer_4' => $this->answer_4,
            'answer_5' => $this->answer_5,
            'answer_6' => $this->answer_6,
            'answer_7' => $this->answer_7,
            'answer_8' => $this->answer_8,
            'answer_9' => $this->answer_9,
            'correct_answers' => $this->correct_answers,
            'image_filename' => $this->image_filename,
                        
        ];
    }
}
