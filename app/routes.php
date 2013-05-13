<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
Route::controller('/', 'ListController');

Route::post('/', function()
{
    if(Session::get('list') == true)
    {
        Session::put('list', false);
    } else
    {
        Session::put('list', true);
    }
    ListController::showList(Session::get('list'));
});
*/

Route::post('tasks', function()
{
    $rules = [
        'task_name' => 'required',
        'priority'  => 'required|integer',
        'time'      => 'required'
    ];
    $val = Validator::make(Input::all(), $rules);
   if(Input::get('delete') != NULL)
   {
       $task = Task::find('delete');
       
       $task->delete();
       
       $message = 'Taak was verwijderd.';
       return Redirect::to('list')->with('warning', $message);
   }elseif($val->fails())
   {
       $message = 'Er moeten nog velden worden ingevoerd';
       return Redirect::to('tasks')->withInput()->with('warning', $message);
   } elseif(!Task::find(Input::get('task_name')))
   {
       $task = new Task;
       
       $task->task_name = Input::get('task_name');
       $task->priority = Input::get('priority');
       $task->time = Input::get('time');
       
       $task->save();
       
       $message = 'Taak succesvol toegevoegd.';
       return Redirect::to('list')->with('warning', $message);
   } elseif(Task::find(Input::get('task_name')))
   {
       $task = Task::find('task_name');
       
       $task->task_name = Input::get('task_name');
       $task->priority = Input::get('priority');
       $task->time = Input::get('time');
       
       $task->save();
       
       $message = 'Taak is geupdate';
       return Redirect::to('list')->with('warning', $message);
   }
   
});

Route::get('list', function()
{
        return View::make('todolist');
});

Route::get('tasks', function()
{
        return View::make('tasks');
});

Route::get('/', function()
{
	return View::make('hello');
});

/*
Route::get('greeting', function()
{
   return View::make('greeting', array('name' => 'Peter-Pim Baken')); 
});
 */