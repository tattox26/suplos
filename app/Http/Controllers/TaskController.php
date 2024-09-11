<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Mostrar pagina
    public function index()
    {      
        $tasks = Task::with('users')->get();        
        return view('task', compact('tasks'));
    }

    // Crear tarea
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:500',
            'email' => 'required|max:500',
        ]);  
        try {                
            $user = User::where('email',$request->email)->first();
            if(!$user){
                return redirect()->back()->withErrors(['msg' => 'Email no found']);
            }            
            $task = new Task();
            $task->user_id = $user->id;
            $task->title = $request->title;
            $task->description = $request->description;
            $task->completed = 1;
            $task->save();
            return redirect()->back()->with('success', 'Task created successfully.');  
        } catch (\Throwable $th) {           
            return redirect()->back()->withErrors(['msg' => 'Something wrong.']);  
        }
    }

    // Pantalla para editar
    public function edit(Task $task)
    {           
        return view('task.edit', compact('task'));
    }
    // Actualizar tarea
    public function update(Request $request, $id)
    {
      
        try {
            $validated = $request->validate([
                'title' => 'required|max:255',
                'description' => 'required|max:500',
            ]);
            $task = Task::find($id);
            if(!$task) {
                return redirect()->back()->withErrors('error', 'Task not found.');
            }
            // Corrección: Se actualiza la tarea con datos validados.
            $task->update($validated);
            return redirect()->route('task')->with('success', 'Task updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['msg' => 'Something wrong.']); 
        }
    }

    // Eliminar tarea
    public function destroy($id)
    {    
        try {        
            $task = Task::find($id);
            if(!$task) {
                return redirect()->back()->withErrors(['msg' => 'Task not found.']);  
            }
            $task->delete();
            return redirect()->back()->with('success', 'Task deleted successfully.');          
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['msg' => 'Something wrong.']); 
        }   
    }
}
