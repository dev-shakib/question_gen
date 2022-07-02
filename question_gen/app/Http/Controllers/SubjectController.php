<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Http\Requests\SubjectRequest;
class SubjectController extends Controller
{
    public function index()
    {
        return response()->json([
            'status'=>200,
            'data'=>Subject::get()
        ]);
    }

    public function store(SubjectRequest $request)
    {
        try{
            $validated = $request->validated();
            return response()->json([
                'status'=>200,
                'message'=>'created',
                'data'=> Subject::create($validated)
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
        $Subject = Subject::where('id',$id)->first();
        return response()->json([
            'status'=> 200,
            'data' =>$Subject
        ]);
    }
    public function update($id, SubjectRequest $request){
        $validated = $request->validated();
        $Subject = Subject::where("id",$id)->update($validated);
        $Subject =  Subject::where("id",$id)->first();
        return response()->json([
            'status'=> 200,
            'message'=>'updated',
            'data' =>$Subject
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
        $Subject = Subject::where('id',$id);
        if($Subject->count() > 0){
            $Subject = $Subject->delete();
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
