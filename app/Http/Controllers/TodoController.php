<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\ClientRequest;

class TodoController extends Controller
{
    public function index(){
        $task = Todo::all();
        return view('index', ['task'=> $task]);
    }

    public function create(ClientRequest $request){
        $task = $request -> all();
        Todo::create($task);
        return redirect('/');
    }

    public function update(ClientRequest $request){
        $task = $request -> all();
        unset($task['_token']);
        Todo::where('id', $request->id)->update($task);
        return redirect('/');
    }

    public function delete(Request $request){
        Todo::where('id', $request->id)->delete();
        return redirect('/');
    }
}
