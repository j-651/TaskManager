@extends('layouts.manage')

@section('content')
    <div class="container flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Manage Tasks</h1>
            </div>
            @if ($tasks->count() !== 0)
                <div class="column">
                    <a href="{{route('tasks.create')}}" class="button is-primary is-pulled-right">
                    <span class="icon m-r-5">
                            <i class="fas fa-plus-circle"></i>
                    </span> Create Task
                    </a>
                </div>
            @endif
        </div>

        <hr class="m-t-0">

        <div class="columns is-multiline has-text-centered">
            @if ($tasks->count() !== 0)
                @foreach ($tasks as $task)
                    <div class="column is-one-quarter-desktop is-one-third-tablet is-half-mobile">
                        <div class="box has-dot">
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
                                $description = 'Due: ' . $task->due_at->diffForHumans();
                                $element = '<span class="dot is-' . $class . '" data-tooltip="' . $description . '"></span>';
                                echo $element;


                                if ($task->status == 0) {
                                    $class = 'danger';
                                    $description = 'Status: Not started';
                                } else if ($task->status == 1) {
                                    $class = 'info';
                                    $description = 'Status: In progress';
                                } else if ($task->status == 2) {
                                    $class = 'success';
                                    $description = 'Status: Completed';
                                } else {
                                    $class = 'info';
                                    $description = 'Status: Unknown';
                                }
                                $element = '<span class="dot is-' . $class . '" data-tooltip="' . $description . '"></span>';
                                echo $element;


                                if ($task->priority == 1) {
                                    $class = 'info';
                                    $description = 'Priority: Low';                                    
                                } else if ($task->priority == 2) {
                                    $class = 'success';
                                    $description = 'Priority: Medium';                                    
                                } else if ($task->priority == 3) {
                                    $class = 'warning';
                                    $description = 'Priority: High';                                    
                                } else if ($task->priority == 4) {
                                    $class = 'danger';
                                    $description = 'Priority: Urgent';                                    
                                } else {
                                    $class = 'info';
                                    $description = 'Priority: Unknown';
                                }
                                $element = '<span class="dot is-' . $class . '" data-tooltip="' . $description . '"></span>';
                                echo $element;
                            @endphp
                            <div class="media">
                                <div class="media-content">
                                    <div class="content">
                                        <h3 class="title m-t-15">{{$task->title}}</h3>
                                        <h4 class="subtitle"><small>Due: {!! $task->due_at->format('n/j/Y') !!}</small></h4>
                                        <p>
                                            {{ (isset($task->description)) ? truncate($task->description, 115, array('ending' => '...', 'exact' => false, 'html' => true)) : 'No description provided' }}
                                        </p>
                                    </div>

                                    <div class="columns">
                                        <div class="column">
                                            <a href="{{route('tasks.show', $task->id)}}" class="button is-primary is-fullwidth">Details</a>
                                        </div>
                                        <div class="column is-one-third">
                                            <a href="{{route('tasks.edit', $task->id)}}" class="button is-info is-outlined is-fullwidth">
                                                <span class="icon">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="column">
                    <pre class="is-size-5">Congratulations! It doesn't look like you have any open tasks.</pre>
                </div>
                <div class="column">
                    <a href="{{ route('tasks.create') }}" class="button is-large is-primary m-t-20">
                        <span class="icon m-r-5">
                            <i class="fas fa-plus-circle"></i>
                        </span> Create a Task
                    </a>
                </div>
            @endif
        </div>
    </div> <!-- /.flex-container -->
    <div class="columns has-text-centered m-t-40 m-b-40">
        <div class="column">
            <object data="{{ url('storage/img/icon-bw.svg') }}" type="image/svg+xml" style="height:15vh">Task Manager</object>
        </div>
    </div>
@endsection