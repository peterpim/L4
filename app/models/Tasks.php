<?php

class Task extends Eloquent {
    
    protected $table = 'task';
    public $timestamps = false;
    
    protected $id = NULL;
    protected $task_name = NULL;
    protected $priority = NULL;
    protected $time = NULL;
}
