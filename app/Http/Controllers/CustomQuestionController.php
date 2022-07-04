<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CustomQuestion;
use Illuminate\Http\Request;
use App\Models\CustomQuestionAnswer;
use App\Models\CustomQuestionOption;
use App\Models\Institute;
use App\Models\Subject;
use Validator;

class CustomQuestionController extends Controller
{
    public function index()
    {

        $qus = CustomQuestion::with(['options','answer','class','institute','board','ques_year','subject'])->get();

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
        $input = $request->only([ 'question','subject','status','class','institute','board','ques_year','marks','ques_limit','time','instructions']);

        $validate_data = [
            'question' => 'required|min:3',
            'subject' => 'required|min:3',
            'status' => 'required',
            'class' => 'required',
            'institute' => 'required',
            'board' => 'required',
            'ques_year' => 'required',
            'marks' => 'required',
            'ques_limit' => 'required',
            'instructions' => 'required',
            'time' => 'required',
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
        $ques = CustomQuestion::create($input);

        $options =$request->options;
        for($i=0;$i<count($options);$i++){
            CustomQuestionOption::create(['name'=>$options[$i],'qus_id'=>$ques->id]);
        }
        $answer =$request->answer;
        for($i=0;$i<count($answer);$i++){
            CustomQuestionAnswer::create(['name'=>$answer[$i],'qus_id'=>$ques->id]);
        }

        $qus = CustomQuestion::with(['options','answer','class','institute','board','ques_year','subject'])->where('id',$ques->id)->first();

        return response()->json([
            'success'=>true,
            'data'=>$qus
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomQuestion  $question
     * @return \Illuminate\Http\Response
     */
    public function updateStatus($id,$status)
    {
        $datas = CustomQuestion::where('id',$id)->count();
        if($datas == 0){
            return response()->json([
                'success'=>false,
                'message'=> "NO DATA FOUND"
            ]);
        }
        CustomQuestion::where('id',$id)->update(['isactive'=>$status]);
        $data = CustomQuestion::with(['options','answer','class','institute','board','ques_year','subject'])->where('id',$id)->first();
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }
    public function show($id)
    {
        $question = CustomQuestion::with(['options','answer','class','institute','board','ques_year','subject'])->where("id",$id);
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
     * @param  \App\Models\CustomQuestion  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = CustomQuestion::where('id',$id)->first();
        $input = $request->only([ 'question','subject','status','class','institute','board','ques_year','marks','ques_limit','time','instructions']);

        $validate_data =  [
            'question' => 'required|min:3',
            'subject' => 'required|min:3',
            'status' => 'required',
            'class' => 'required',
            'institute' => 'required',
            'board' => 'required',
            'ques_year' => 'required',
            'marks' => 'required',
            'ques_limit' => 'required',
            'instructions' => 'required',
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

        CustomQuestion::where('id',$id)->update($input);
        $question->options()->delete();
        $question->answer()->delete();
        // $ques = CustomQuestion::create($input);

        $options =$request->options;
        for($i=0;$i<count($options);$i++){
            CustomQuestionOption::create(['name'=>$options[$i],'qus_id'=>$question->id]);
        }
        $answer =$request->answer;
        for($i=0;$i<count($answer);$i++){
            CustomQuestionAnswer::create(['name'=>$answer[$i],'qus_id'=>$question->id]);
        }

        $qus = CustomQuestion::with(['options','answer','class','institute','board','ques_year','subject'])->where('id',$question->id)->first();



        return response()->json([
            'success'=>true,
            'msg' => "UPDATED",
            'data'=>$qus
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomQuestion  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $question = CustomQuestion::where("id",$id);
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
