<?php

namespace App\Http\Controllers;

use App\Models\Student;
use domain\facade\TodoFacade;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    protected  $task;
    public function __construct(){

        $this->task = new Student();

    }



    public function index(){

        $response['tasks'] = TodoFacade::all();
        return view('pages.todo.index')->with($response);
    }

    public function store(Request $request){

      TodoFacade::store($request->all());

        return redirect()-> back();

    }

    public function delete($task_id){

        TodoFacade::delete($task_id);

        return redirect()->back();
    }









}
