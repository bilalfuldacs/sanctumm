<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TaskResource::collection(Task::where('user_id', Auth::user()->id)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        if ($this->IsAuthorized($task)) {

            return   $this->IsAuthorized($task);
        } else {
            return ("you are not authenticated to it");
        }
        // if (Auth::user()->id == $task->user_id) {
        //     return new Taskresource($task);
        // } else {
        //     return ("you are not authenticated to view this task");
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, task $task)
    {
        if ($this->IsAuthorized($task)) {
            $task->update($request->all());
            return  $this->IsAuthorized($task);
        } else {
            return ("you are not authenticated to it");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(task $task)
    {
        if ($this->IsAuthorized($task)) {
            $task->delete();
            $this->IsAuthorized($task);
        } else {
            return ("you are not authenticated to it");
        }
        // if (IsAuthorized($task)) {
        //     $task->delete();
        //     return new TaskResource($task);
        // } else {
        //     return ("you are not authenticated to delete this task");
        // }
    }
    private function IsAuthorized($task)
    {
        if (Auth::user()->id == $task->user_id) {
            return new TaskResource($task);
        }
    }
}
