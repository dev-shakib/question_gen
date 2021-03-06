<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\QuestionYear;
use App\Models\Status;
use Exception;
use App\Http\Requests\BoardRequest;
use App\Http\Requests\BoardYearRequest;
use App\Http\Requests\StatusRequest;
class BoardController extends Controller
{
    public function index()
    {
        return response()->json([
            'status'=>200,
            'data'=>Board::get()
        ]);
    }
    public function store(BoardRequest $request)
    {
        try{
            $validated = $request->validated();


            return response()->json([
                'status'=>200,
                'message'=>'created',
                'data'=> Board::create($validated)
            ]);

        }catch(Exception $e)
        {
            return response()->json([
                'status'=>401,
                'data'=> $e->getMessage()
            ]);
        }
    }
    public function show($board)
    {
        $board = Board::where('id',$id)->first();
        return response()->json([
            'status'=> 200,
            'data' =>$board
        ]);
    }
    public function update($id, BoardRequest $request){
        $validated = $request->validated();
        $board = Board::where("id",$id)->update($validated);
        $board =  Board::where("id",$id)->first();
        return response()->json([
            'status'=> 200,
            'message'=>'updated',
            'data' =>$board
        ]);
    }
    public function destroy($id){
        $board = Board::where('id',$id);
        if($board->count() > 0){
            $board = $board->delete();
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
    public function questionYearAll()
    {
        return response()->json([
            'status'=>200,
            'data'=>QuestionYear::get()
        ]);
    }
    public function questionYearCreate(BoardYearRequest $request)
    {
        try{
            $validated = $request->validated();


            return response()->json([
                'status'=>200,
                'message'=>'created',
                'data'=> QuestionYear::create($validated)
            ]);

        }catch(Exception $e)
        {
            return response()->json([
                'status'=>401,
                'data'=> $e->getMessage()
            ]);
        }
    }
    public function questionYearShow($id)
    {
        $board = QuestionYear::where('id',$id)->first();
        return response()->json([
            'status'=> 200,
            'data' =>$board
        ]);
    }
    public function questionYearUpdate($id, BoardYearRequest $request){
        $validated = $request->validated();
        $board = QuestionYear::where("id",$id)->update($validated);
        $board =  QuestionYear::where("id",$id)->first();
        return response()->json([
            'status'=> 200,
            'message'=>'updated',
            'data' =>$board
        ]);
    }
    public function boardYearDelete($id){
        $board = QuestionYear::where('id',$id);
        if($board->count() > 0){
            $board = $board->delete();
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
    public function statusAll()
    {
        return response()->json([
            'status'=>200,
            'data'=>Status::get()
        ]);
    }
    public function statusCreate(StatusRequest $request)
    {
        try{
            $validated = $request->validated();


            return response()->json([
                'status'=>200,
                'message'=>'created',
                'data'=> Status::create($validated)
            ]);

        }catch(Exception $e)
        {
            return response()->json([
                'status'=>401,
                'data'=> $e->getMessage()
            ]);
        }
    }
    public function statusShow($id)
    {
        $board = Status::where('id',$id)->first();
        return response()->json([
            'status'=> 200,
            'data' =>$board
        ]);
    }
    public function statusUpdate($id, StatusRequest $request){
        $validated = $request->validated();
        $board = Status::where("id",$id)->update($validated);
        $board =  Status::where("id",$id)->first();
        return response()->json([
            'status'=> 200,
            'message'=>'updated',
            'data' =>$board
        ]);
    }
    public function statusDelete($id){
        $board = Status::where('id',$id);
        if($board->count() > 0){
            $board = $board->delete();
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
