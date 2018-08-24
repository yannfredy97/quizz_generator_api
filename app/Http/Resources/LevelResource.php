<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Subject;

class LevelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //attached subjects and attached subjects' title
        $subjects = $this->subjects;
        $subjectResources = array(); 
        $attached_subject_titles = array();        
        for($index=0; $index < count($subjects); $index++){
            $subjectResources[$index] = new SubjectResource($subjects[$index]);
            $attached_subject_titles[$index] = $subjectResources[$index]->title;
        };


        //all subjects and all subjects' title
        $all_subjects = Subject::All();
        $all_subject_titles = array();
        for($index=0; $index < count($all_subjects); $index++){
            $all_subject_titles[$index] = $all_subjects[$index]->title;
        };

        //not attached subjects and not attached subjects' title
        $not_attached_subjects = array();
        for($index = 0; $index < count($all_subjects); $index++){
            if(!in_array($all_subject_titles[$index], (array)$attached_subject_titles))
                $not_attached_subjects[$index] = $all_subjects[$index];
        }
		
        
       return [
           'id' => $this->id,
           'title' => $this->title,
           'attached_subjects' => $subjectResources,
           'not_attached_subjects' => $not_attached_subjects,
       ];
    }
}
