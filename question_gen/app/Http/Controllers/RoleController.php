<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Requests\StoreRoleRequest;
class RoleController extends Controller
{
    public function index()
    {
        return response()->json([
            'status'=>200,
            'data'=>Role::get()
        ]);
    }

    public function store(StoreRoleRequest $request)
    {
        try{
            $validated = $request->validated();
            return response()->json([
                'status'=>200,
                'message'=>'created',
                'data'=> Role::create($validated)
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
        $Role = Role::where('id',$id)->first();
        return response()->json([
            'status'=> 200,
            'data' =>$Role
        ]);
    }
    public function update($id, StoreRoleRequest $request){
        $validated = $request->validated();
        $Role = Role::where("id",$id)->update($validated);
        $Role =  Role::where("id",$id)->first();
        return response()->json([
            'status'=> 200,
            'message'=>'updated',
            'data' =>$Role
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
        $Role = Role::where('id',$id);
        if($Role->count() > 0){
            $Role = $Role->delete();
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
    public function assignPermission($id)
    {
        $Role = Role::where('id',$id)->first();
        $permission = Permission::whereIn('id',[16,11,7,2])->get();
        foreach($permission as $p){

            $Role->attachPermission($p);
        }
    }
}
