@extends('layouts.manage')

@section('content')
    <div class="container flex-container">
        <div class="columns m-t-10">
            <div class="column is-three-quarters">
                <h1 class="title">{!!$task->status == 3 ? '<span class="icon m-r-10"><i class="fas fa-check has-text-success m-r-15"></i></span><b>Completed</b>' : 'View'!!} Task: <b>{{$task->title}}</b></h1>
            </div>
            <div class="column">
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" id="delete-task">
                    @csrf
                    {{ method_field('DELETE') }}
                    
                    <a href="#" onclick="document.getElementById('delete-task').submit();" class="button is-danger is-outlined is-pulled-right"><span class="icon m-r-5"><i class="fas fa-trash-alt"></i></span> Delete Task</a>
                </form>
            </div>
            <div class="column">
                <a href="{{route('tasks.edit', $task->id)}}" class="button is-primary is-pulled-right">
                    <span class="icon m-r-5">
                        <i class="fa fa-edit"></i>
                    </span> Edit Task
                </a>
            </div>
        </div>

        <hr class="m-t-0">

        <div class="columns">
            <div class="column">
                <div class="columns">
                    <div class="column is-one-fifth">
                        <div class="field is-primary">
                            <label for="title" class="label">Priority:</label>
                            @php
                                if ($task->priority == 1) {
                                    $class = 'info';
                                    $description = 'Low';                                    
                                } else if ($task->priority == 2) {
                                    $class = 'success';
                                    $description = 'Medium';                                    
                                } else if ($task->priority == 3) {
                                    $class = 'warning';
                                    $description = 'High';                                    
                                } else if ($task->priority == 4) {
                                    $class = 'danger';
                                    $description = 'Urgent';                                    
                                } else {
                                    $class = 'info';
                                    $description = 'Unknown';
                                }
                                $element = '<pre class="has-background-' . $class . '">' . $description . '</pre>';
                                echo $element;
                            @endphp
                        </div>
                    </div>
                    <div class="column is-one-fifth">
                        <div class="field is-primary">
                            <label for="title" class="label">Status:</label>
                            @php
                                if ($task->status == 0) {
                                    $class = 'danger';
                                    $description = 'Not started';
                                } else if ($task->status == 1) {
                                    $class = 'info';
                                    $description = 'In progress';
                                } else if ($task->status == 2) {
                                    $class = 'success';
                                    $description = 'Completed';
                                } else {
                                    $class = 'info';
                                    $description = 'Unknown';
                                }
                                $element = '<pre class="has-background-' . $class . '">' . $description . '</pre>';
                                echo $element;
                            @endphp
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="created_at" class="label">Assigned:</label>
                            <pre>{!! $task->created_at->format('n/j/Y') !!} {!! ($task->created_at != $task->updated_at) ? '<em>(Edited: ' . $task->updated_at->format('n/j/Y') . ')</em>' : '' !!}</pre>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field is-primary">
                            <label for="title" class="label">Due:</label>
                            @php
                                if($current_time->gt($task->due_at)) {
                                    $class = 'danger';
                                } else if ($task->due_at->isToday()) {
                                    $class = 'warning';
                                } else if ($task->due_at->diffInDays($current_time->copy()->addWeek()) <= 7) {
                                    $class = 'info';
                                } else {
                                    $class = 'primary';
                                }
                                $description = $task->due_at->diffForHumans() . ' <em>(' . $task->due_at->format('n/j/Y') . ')</em>';
                                $element = '<pre class="has-background-' . $class . '">' . $description . '</pre>';
                                echo $element;
                            @endphp
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label for="description" class="label">Description:</label>
                            <pre>{{ (isset($task->description)) ? $task->description : 'No description provided' }}</pre>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="column has-text-centered">
                        <object data="{{ url('storage/img/icon-bw.svg') }}" type="image/svg+xml" style="height:15vh">Task Manager</object>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.flex-container -->
@endsection