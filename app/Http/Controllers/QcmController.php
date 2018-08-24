<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qcm;
use App\Http\Resources\QcmResource;


class QcmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $qcm;

     public function __construct(Qcm $qcm)
     {
         
         $this->qcm = $qcm;
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
        $qcm = $this->qcm;
        $qcm->chapter_id = $request['chapter_id'];
        $qcm->question = $request['question'];
        $qcm->answer_1 = $request['answer_1'];
        $qcm->answer_2 = $request['answer_2'];
        $qcm->answer_3 = $request['answer_3'];
        $qcm->answer_4 = $request['answer_4'];
        $qcm->answer_5 = $request['answer_5'];
        $qcm->answer_6 = $request['answer_6'];
        $qcm->answer_7 = $request['answer_7'];
        $qcm->answer_8 = $request['answer_8'];
        $qcm->answer_9 = $request['answer_9'];
        $qcm->correct_answers = $request['correct_answers'];
        $qcm->image_filename = $request['image_filename'];
        $qcm->save();
        
        return response()->json(['error' => 'false','message' => 'qcm successfully created']);            
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Qcm $qcm)
    {
        return new QcmResource($qcm);        
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
        $qcm = Qcm::find($id);
        $qcm->update($request->only(['chapter_id','question','answer_1','answer_2','answer_3','answer_4','answer_5','answer_6',
        'answer_7','answer_8','answer_9','correct_answers','image_filename']));  
        return response()->json(['success' => 'qcm successfully modified']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qcm = Qcm::findorFail($id);
        $qcm->delete();
        return response()->json(['error' => 'false','message' => 'qcm successfully deleted']);            
        
    }
}
