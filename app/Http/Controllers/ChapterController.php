<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Qcm;
use App\Http\Resources\ChapterResource;


class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $chapter;

    public function __construct(Chapter $chapter)
    {
        
        $this->chapter = $chapter;
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
        $chapter = $this->chapter;
        $chapter->title = $request['title'];
        $chapter->course_id = $request['course_id'];
        $chapter->save();
        
        return response()->json(['error' => 'false','message' => 'chapter successfully created']);            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Chapter $chapter)
    {
        return new ChapterResource($chapter);
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
       
        $chapter = Chapter::find($id);
        $chapter->update($request->only(['title','course_id']));  
        return response()->json(['success' => 'chapter successfully modified']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chapter = Chapter::findorFail($id);
        $qcms = Qcm::All()->where('chapter_id', '=', $id);
        if(count($qcms) > 0){
            foreach($qcms as $qcm){
                $qcm->delete();                        
            }
        }
        $chapter->delete();
        return response()->json(['error' => 'false','message' => 'chapter successfully deleted']);            
        
    }
}
