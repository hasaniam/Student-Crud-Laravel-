<?php

namespace domain\Services;

use App\Models\Student;

class TodoService{

    protected  $task;
    public function __construct(){

        $this->task = new Student();

    }



    public function all(){

        return $this->task->all();


    }

    public function store($data){

        $this->task->create($data);



    }

    public function delete($task_id){

        $task = $this->task->find($task_id);
        $task->delete();


    }




}
