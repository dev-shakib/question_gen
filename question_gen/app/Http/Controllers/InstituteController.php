<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;
use App\Http\Requests\InstituteRequest;
class InstituteController extends Controller
{
    public function index()
    {
        return response()->json([
            'status'=>200,
            'data'=>Institute::get()
        ]);
    }

    public function store(InstituteRequest $request)
    {
        try{
            $validated = $request->validated();


            return response()->json([
                'status'=>200,
                'message'=>'created',
                'data'=> Institute::create($validated)
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
        $Institute = Institute::where('id',$id)->first();
        return response()->json([
            'status'=> 200,
            'data' =>$Institute
        ]);
    }
    public function update($id, InstituteRequest $request){
        $validated = $request->validated();
        $Institute = Institute::where("id",$id)->update($validated);
        $Institute =  Institute::where("id",$id)->first();
        return response()->json([
            'status'=> 200,
            'message'=>'updated',
            'data' =>$Institute
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
        $Institute = Institute::where('id',$id);
        if($Institute->count() > 0){
            $Institute = $Institute->delete();
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
