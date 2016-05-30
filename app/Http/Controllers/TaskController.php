<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
        */
        $order = \Request::get('order');
        if($order){
            $tasks = DB::table('tasks')->OrderBy('title', $order)->paginate(5);
            return view('tasks.index', ['tasks' => $tasks]);
        }
        $tasks = DB::table('tasks')->paginate(5);
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function search(){
        $search = \Request::get('busca');
        $order = \Request::get('order');
        if($search){
            if($order){
                $tasks = Task::where('title', 'like', '%'.$search.'%')->OrderBy('title', $order)->paginate(5);
                return view('tasks.index', ['tasks' => $tasks]);
            }
            $tasks = Task::where('title', 'like', '%'.$search.'%')->paginate(5);
            return view('tasks.index', ['tasks' => $tasks]);
        }
        return redirect('task');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validação
        $this->validate($request, array(
            'title' => 'required|max:60',
            'description' => 'required|min:5'
        ));

        //dd($request);
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;

        $task->save();

        return redirect('task');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }

    public function delete($id)
    {
        return view('tasks.delete', compact($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validação
        // Validação
        $this->validate($request, array(
            'title' => 'required|max:60',
            'description' => 'required|min:5'
        ));

        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();
        return redirect('task');
    }

    /**
     * Atualiza via jQuery, recebendo um JSON
     */
    public function updateJQuery(Request $request, $id)
    {
        $task = Task::find($id);
        //if($task == null) return redirect('task');
        if($task->status === "Fazendo" || $task->status === "A fazer"){
            $task->status = "Feita";
            $task->save();
            return redirect('task');
        } else {
            $task->status = "Fazendo";
            $task->save();
            return redirect('task');
        }
        return "Erro na requisição !";
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect('task');
    }
}
