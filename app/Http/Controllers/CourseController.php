<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Level;
use App\Models\Subject;
use App\Models\Chapter;
use App\Models\Qcm;


use App\Http\Resources\CourseResource;



class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $course;

     public function __construct(Course $course)
     {
         
         $this->course = $course;
	 //$this->middleware('auth:api');

     }



    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $level_id = $request->level_id;
        $subject_id = $request->subject_id;

        $level = Level::find($level_id);
        if($level != null){
            //if($level->subjects()->contains(Subject::find($subject_id)))
            
            $level->subjects()->attach($subject_id);
            return response()->json(['error' => 'false','message' => 'course successfully created']);            
        }
        else
            return response()->json(['error' => 'true', 'message' => 'the selected level does not exist']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
    
        return new CourseResource($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findorFail($id);
        $chapters = Chapter::All()->where('course_id', '=', $id);
        if (count($chapters) > 0){
            foreach($chapters as $chapter){
                $chapter->delete();
                $qcms = Qcm::All()->where('chapter_id', '=', $chapter->id);
                if(count($qcms)> 0){
                    foreach($qcms as $qcm){
                        $qcm->delete();                        
                    }
                }
            }

        }
        $course->delete();
        return response()->json(['error' => 'false','message' => 'course successfully deleted']);            
        
    }



    public function retrieveCourse(Request $request){

        $level_id = $request['level_id'];
        $subject_id = $request['subject_id'];
        $course = Course::All()->where('level_id','=',$level_id)->where('subject_id','=',$subject_id);
        
        foreach($course as $key=>$value)
           return new CourseResource($value);
        

    }




}
