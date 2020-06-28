<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Boards;


class boardcontroller extends Controller
{
    public function index()
    {
        $user=auth()->user()->name;
        $Todos = DB::table('boards')->select('id','title','desc','status')->where('status', 'ToDo')->where('edited_by',$user)->get();
        $inprogress = DB::table('boards')->select('id','title','desc','status')->where('status', 'inprogress')->where('edited_by',$user)->get();
        $dones = DB::table('boards')->select('id','title','desc','status')->where('status', 'Done')->where('edited_by',$user)->get();
        return view('boards.todayboard', compact('Todos','inprogress','dones'));        
    }
    public function create(Request $request)
    {
       
      Boards::create([
                
            'title' => $request->get('title'),
            'desc' => $request->get('desc'),
            'status' => $request->get('status'),
            'edited_by'=>$request->get('edited_by'),
          ]);
        
        return redirect()->route('board.index')->with('success','Card created successfully.');
  
    }
    public function edit(Boards $board)
    {   
        //$board=DB::table('boards')->select('id','title','desc','status')->where('id',$id)->get();
        
        return view('boards.edit',compact('board'));
    }
    public function update(Request $request, Boards $boards)
    {
        $id=$request->get('id');
        Boards::where('id',$id)->update([
                
            'title' => $request->get('title'),
            'desc' => $request->get('desc'),
            'status' => $request->get('status'),
            'edited_by'=>$request->get('edited_by'),
          ]);

        return redirect()->route('board.index')
                        ->with('success','board updated successfully');
    }

}