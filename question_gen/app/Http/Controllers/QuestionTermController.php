<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionTerms;
use App\Http\Requests\QuestionTermsRequest;
class QuestionTermController extends Controller
{
    public function index()
    {
        return response()->json([
            'status'=>200,
            'data'=>QuestionTerms::get()
        ]);
    }

    public function store(QuestionTermsRequest $request)
    {
        try{
            $validated = $request->validated();
            return response()->json([
                'status'=>200,
                'message'=>'created',
                'data'=> QuestionTerms::create($validated)
            ]);

        }catch(Exception $e)
        {
            return response()->json([
                'status'=>401,
                'data'=> $e->getMessage()
            ]);
        }
    }
    public function show($id)
    {
        $QuestionTerms = QuestionTerms::where('id',$id)->first();
        return response()->json([
            'status'=> 200,
            'data' =>$QuestionTerms
        ]);
    }
    public function update($id, QuestionTermsRequest $request){
        $validated = $request->validated();
        $QuestionTerms = QuestionTerms::where("id",$id)->update($validated);
        $QuestionTerms =  QuestionTerms::where("id",$id)->first();
        return response()->json([
            'status'=> 200,
            'message'=>'updated',
            'data' =>$QuestionTerms
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $QuestionTerms = QuestionTerms::where('id',$id);
        if($QuestionTerms->count() > 0){
            $QuestionTerms = $QuestionTerms->delete();
            return response()->json([
                'status'=> 200,
                'message'=>'Deleted',
            ]);

        }else{
            return response()->json([
                'status'=> 401,
                'message'=>'Provide Valid ID',
            ]);

        }
    }
}
