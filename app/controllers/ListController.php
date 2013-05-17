<?php

class ListController extends Controller {

    public function getIndex() {
        return View::make('todolist')
                ->with('tasks', Task::all());
    }

}

?>
