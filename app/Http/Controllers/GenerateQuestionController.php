<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenerateQuestion;
use App\Models\Subject;
use App\Models\Question;
use Validator;
use Exception;
class GenerateQuestionController extends Controller
{
    public function index(){
        $datas = GenerateQuestion::get();
        return response()->json([
            'success'=>true,
            'data' => $datas
        ]);
    }
    public function store(Request $request){
        $input = $request->only(['class', 'status','marks','ques_limit','subject','ques_type','exam_time','instructions']);

        $validate_data = [
            'class' => 'required',
            'status' => 'required',
            'marks' => 'required|min:2',
            'ques_limit' => 'required',
            'subject' => 'required',
            'ques_type' => 'required',
            'exam_time' => 'required',
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

        $sub = Subject::where('name',$input['subject']);
        if($sub->count() > 0){
            $sub = $sub->first();
            $input['subject'] = $sub->id;
        }

        $question = Question::where(['ques_type'=>$input['ques_type'],'subject'=> $input['subject'],'class'=>$input['class'],'status'=>$input['status']])->limit($input['ques_limit'])->inRandomOrder()->get();
        $ques_ids = [];
        foreach($question as $qus){
            array_push($ques_ids, $qus->id);
        }
        $input['ques_ids'] = json_encode($ques_ids);
        $datas = GenerateQuestion::create($input);
        return response()->json([
            'success'=>true,
            'data'=>$datas
        ]);
    }
    public function update(Request $request,$id){

        $input = $request->only(['class', 'status','marks','ques_limit','subject','ques_type','exam_time','instructions']);

        $validate_data = [
            'class' => 'required',
            'status' => 'required',
            'marks' => 'required|min:2',
            'ques_limit' => 'required',
            'subject' => 'required',
            'ques_type' => 'required',
            'exam_time' => 'required',
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

        $sub = Subject::where('name',$input['subject']);
        if($sub->count() > 0){
            $sub = $sub->first();
            $input['subject'] = $sub->id;
        }

        $question = Question::where(['ques_type'=>$input['ques_type'],'subject'=> $input['subject'],'class'=>$input['class'],'status'=>$input['status']])->limit($input['ques_limit'])->inRandomOrder()->get();
        $ques_ids = [];
        foreach($question as $qus){
            array_push($ques_ids, $qus->id);
        }
        $input['ques_ids'] = json_encode($ques_ids);
        GenerateQuestion::where('id',$id)->update($input);
        $datas = GenerateQuestion::where('id',$id)->first();
        return response()->json([
            'success'=>true,
            'msg'=>"UPDATED",
            'data'=>$datas
        ]);
    }
    public function updateStatus($id,$status)
    {
        $datas = GenerateQuestion::where('id',$id)->count();
        if($datas == 0){
            return response()->json([
                'success'=>false,
                'message'=> "NO DATA FOUND"
            ]);
        }
        GenerateQuestion::where('id',$id)->update(['isactive'=>$status]);
        $data = GenerateQuestion::where('id',$id)->first();
        return response()->json([
            'success'=>true,
            'data'=>$data
        ]);
    }
    public function show($id){
        $datas = GenerateQuestion::where('id',$id);
        if($datas->count() == 0)
        {
            return response()->json([
                'success'=>false,
                'message'=> "NO DATA FOUND"
            ]);
        }
        return response()->json([
            'success'=>true,
            'data' => $datas->first()
        ]);
    }
    public function destroy($id){
        $datas = GenerateQuestion::where('id',$id);
        if($datas->count() == 0)
        {
            return response()->json([
                'success'=>false,
                'message'=> "NO DATA FOUND"
            ]);
        }
        $datas->delete();
        return response()->json([
            'success'=>true,
            'message'=> "DATA DELETED"
        ]);
    }
}
