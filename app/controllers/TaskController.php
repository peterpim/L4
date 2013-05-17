<?php

class TaskController extends Controller {
    
    // GET /tasks
    function getIndex() {
        return View::make('todolist')
                ->with('tasks', Task::all());
    }
    
    // GET /tasks/create
    function getCreate() {
        return View::make('createtask');
    }
    
    // POST /tasks/create
    function postCreate() {
        $task = new Task;

        $this->fillTask($task);
        
        $message = 'Taak was succesvol toegevoegd.';
        return Redirect::to('tasks')->with('status', $message);
    }
    
    // DELETE /tasks/delete
    function getDelete($id) {
        $task = Task::find($id);
        $task->delete();
        
        $message = 'Taak was verwijderd.';
        return Redirect::to('tasks')->with('status', $message);
    }
    
    // POST /tasks/update
    function postUpdate($id) {
        $task = Task::find($id);
        
        $this->fillTask($task);
        
        $message = 'Taak was gewijzigd.';
        return Redirect::to('tasks')->with('status', $message);
    }
    
    function getUpdate($id) {
        $task = Task::find($id);
        return View::make('updatetask')->with('task_name', $task->task_name)
                ->with('priority', $task->priority)
                ->with('time', $task->time);
    }
    
    protected function fillTask($task) {
        $task->task_name = Input::get('task_name');
        $task->priority = Input::get('priority');
        $task->time = Input::get('time');
        
        $task->save();
    }
    
}
?>
