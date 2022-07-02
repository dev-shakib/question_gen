<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePermissionRequest;
use App\Models\Permission;
class PermissionController extends Controller
{
    public function index()
    {
        return response()->json([
            'status'=>200,
            'data'=>Permission::get()
        ]);
    }

    public function store(StorePermissionRequest $request)
    {
        try{
            $validated = $request->validated();
            return response()->json([
                'status'=>200,
                'message'=>'created',
                'data'=> Permission::create($validated)
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
        $Permission = Permission::where('id',$id)->first();
        return response()->json([
            'status'=> 200,
            'data' =>$Permission
        ]);
    }
    public function update($id, StorePermissionRequest $request){
        $validated = $request->validated();
        $Permission = Permission::where("id",$id)->update($validated);
        $Permission =  Permission::where("id",$id)->first();
        return response()->json([
            'status'=> 200,
            'message'=>'updated',
            'data' =>$Permission
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
        $Permission = Permission::where('id',$id);
        if($Permission->count() > 0){
            $Permission = $Permission->delete();
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
