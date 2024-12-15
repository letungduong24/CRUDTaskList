<?php 
 
namespace App\Http\Controllers; 
 
use App\Models\Task; 
use Illuminate\Http\Request; 
 
class TaskController extends Controller 
{ 
// REST GET - GET VIEW ALL TASK
    public function index() 
    { 
        $tasks = Task::all(); 
        return view('index', compact('tasks')); 
    } 
 
// REST POST - CREATE 
    public function store(Request $request) 
    { 
        $request->validate([ 
            'title' => 'required', 
            'description' => 'required', 
        ]); 
        $data = $request->all();
        $data['completed'] = $request->has('completed') ? 1 : 0;
        Task::create($data); 
 
        return redirect()->route('index')->with('success', 'Task created successfully.'); 
    } 
 
// REST GET - GET VIEW SHOW
    public function show($slug) 
    { 
        $task = Task::find($slug);
        return view('show', compact('task')); 
    } 
 
// REST GET - GET VIEW EDIT
    public function edit($slug) 
    {     
        $task = Task::find($slug);
        return view('edit', compact('task')); 
    } 
 
// REST PUT - UPDATE
    public function update(Request $request, $slug) 
    { 
        $request->validate([ 
            'title' => 'required', 
            'description' => 'required', 
        ]); 
        $task = Task::find($slug);
        $data = $request->all();
        $data['completed'] = $request->has('completed') ? 1 : 0;
        $task->update($data); 
        return redirect()->route('index')->with('success', 'Task updated successfully.'); 
    } 
 
// REST DELETE - DELETE
    public function destroy(Request $request) 
    { 
        $data = $request->all();
        $task = Task::find($data['id']);
        $task->delete(); 
 
        return redirect()->route('index')->with('success', 'Task deleted successfully.'); 
    } 
}