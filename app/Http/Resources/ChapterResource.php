<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Level;
use App\Models\Subjects;
use App\Http\Resources\LevelResource;
use App\Http\Resources\SubjectResource;
use App\Http\Resources\CourseResource;

class ChapterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $course = $this->course;
        $courseResource = new CourseResource($course);
        
        return [
            'id' => $this->id,
            'title' => $this->title,
            'course' => [
                'level' => $course->level,
                'subject' => $course->subject,
            ],
            'qcms' => $this->qcms,
        ];
    }
}
