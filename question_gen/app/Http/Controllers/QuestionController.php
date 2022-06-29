<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuestionAnswer;
use App\Models\QuestionOption;
use App\Models\Institute;
use App\Models\Subject;
use Validator;
use Exception;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qus = Question::with(['options','answer','class','institute','board','ques_year','subject'])->get();

        return response()->json([
            'success'=>true,
            'data' => $qus
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only(['ques_type', 'question','subject','status','class','institute','board','ques_year']);

        $validate_data = [
            'ques_type' => 'required',
            'question' => 'required|min:3',
            'subject' => 'required|min:3',
            'status' => 'required',
            'class' => 'required',
            'institute' => 'required',
            'board' => 'required',
            'ques_year' => 'required',
        ];

        $validator = Validator::make($input, $validate_data);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please see errors parameter for all errors.',
                'errors' => $validator->errors()
            ]);
        }
        $ins = Institute::where('name',$input['institute']);
        if($ins->count() > 0){
            $ins = $ins->first();
            $input['institute'] = $ins->id;
        }else{
            $ins = Institute::create(['name'=>$input['institute']]);
            $input['institute'] = $ins->id;
        }
        $sub = Subject::where('name',$input['subject']);
        if($sub->count() > 0){
            $sub = $sub->first();
            $input['subject'] = $sub->id;
        }else{
            $sub = Subject::create(['name'=>$input['subject']]);
            $input['subject'] = $sub->id;
        }
        $ques = Question::create($input);

        $options =$request->options;
        for($i=0;$i<count($options);$i++){
            QuestionOption::create(['name'=>$options[$i],'qus_id'=>$ques->id]);
        }
        $answer =$request->answer;
        for($i=0;$i<count($answer);$i++){
            QuestionAnswer::create(['name'=>$answer[$i],'qus_id'=>$ques->id]);
        }

        $qus = Question::with(['options','answer','class','institute','board','ques_year','subject'])->where('id',$ques->id)->first();

        return response()->json([
            'success'=>true,
            'data'=>$qus
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::with(['options','answer','class','institute','board','ques_year','subject'])->where("id",$id);
        if($question->count() > 0){
            $question = $question->first();
            return response()->json([
                'success'=>true,
                'data'=>$question
            ]);

        }else{
            return response()->json([
                'success'=>false,
                'message'=>"NO DATA FOUND"
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $question = Question::where("id",$id);
        if($question->count() > 0){
            $question = $question->first();
            $question->answer()->delete();
            $question->options()->delete();
            $question->delete();
            return response()->json([
                'success'=>true,
                'message'=>"DELETED QUESTION"
            ]);

        }else{
            return response()->json([
                'success'=>false,
                'message'=>"NO DATA FOUND"
            ]);
        }
    }
}
