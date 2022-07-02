<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Http\Requests\ClassesRequest;
class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'status'=>200,
            'data'=>Classes::get()
        ]);
    }

    public function store(ClassesRequest $request)
    {
        try{
            $validated = $request->validated();


            return response()->json([
                'status'=>200,
                'message'=>'created',
                'data'=> Classes::create($validated)
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
        $Classes = Classes::where('id',$id)->first();
        return response()->json([
            'status'=> 200,
            'data' =>$Classes
        ]);
    }
    public function update($id, ClassesRequest $request){
        $validated = $request->validated();
        $Classes = Classes::where("id",$id)->update($validated);
        $Classes =  Classes::where("id",$id)->first();
        return response()->json([
            'status'=> 200,
            'message'=>'updated',
            'data' =>$Classes
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
        $Classes = Classes::where('id',$id);
        if($Classes->count() > 0){
            $Classes = $Classes->delete();
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
