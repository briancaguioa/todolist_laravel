<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Task;
use Session;

class TaskController extends Controller
{
    public function showTasks() {
    	$tasks = Task::all();
    	return view("tasks.tasklist", compact('tasks'));
    }

    public function addTasks(Request $request){
    	$task = new Task;
    	$task->name = $request->newtask;
    	$task->save();
    	Session::flash("success_message", "Task Successfuly added");
    	return redirect("tasklist");
    }

    public function editTasks($id, Request $request) {
    	$task = Task::find($id); 
    	$task->name = $request->editedTask;
    	$task->save();
    	Session::flash("success_message", "Task Successfuly edited");
    	return redirect('/tasklist'); 
    }

     public function deleteTasks($id, Request $request) {
		// $task= Task::where('id', $id)->delete();
		$task = Task::find($id);
		$task->delete();
		Session::flash("success_message", "Task Successfuly deleted");

    	return redirect('/tasklist'); 
    }

}

