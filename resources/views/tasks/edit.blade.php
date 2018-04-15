@extends('layouts.manage')

@section('content')
    <div class="container flex-container">
        <div class="columns m-t-10">
            <div class="column is-three-quarters">
                <h1 class="title">Edit Task</h1>
            </div>
            <div class="column">
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" id="delete-task">
                    @csrf
                    {{ method_field('DELETE') }}
                    
                    <a href="#" onclick="document.getElementById('delete-task').submit();" class="button is-danger is-outlined is-pulled-right"><span class="icon m-r-5"><i class="fas fa-trash-alt"></i></span> Delete Task</a>
                </form>
            </div>
        </div>

        <hr class="m-t-0">

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
        
            <div class="columns">
                <div class="column">
                    <div class="box">
                        <div class="content">
                            <h2 class="title">Task Details:</h2>                                    
                            <div class="field">
                                <p class="control">
                                    <label for="title" class="label">Title</label>
                                    <input type="text" class="input" name="title" value="{{ $task->title }}" id="title">
                                </p>
                            </div>

                            <div class="field">
                                <p class="control">
                                    <label for="description" class="label">Description</label>
                                    <input type="text" class="input" name="description" value="{{ $task->description }}" id="description">
                                </p>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Status">
                                        <b-select placeholder="Select this task's status" v-model="statusSelected" expanded>
                                            <option value="0">Not Started</option>
                                            <option value="1">In Progress</option>
                                            <option value="2">Complete</option>
                                        </b-select>
                                    </b-field>
                                </div>

                                <div class="column">
                                    <b-field label="Priority">
                                        <b-select placeholder="Select a priority" v-model="prioritySelected" expanded>
                                            <option value="1">Low</option>
                                            <option value="2">Medium</option>
                                            <option value="3">High</option>
                                            <option value="4">Urgent</option>
                                        </b-select>
                                    </b-field>
                                </div>

                                <div class="column">
                                    <b-field label="Due Date">
                                        <b-datepicker v-model="date" :first-day-of-week="1" :min-date="minDate" placeholder="Click to select...">
                                
                                            <button class="button is-primary" @click.prevent="date = tomorrow">
                                                <b-icon icon="calendar-check"></b-icon>
                                                <span>Tomorrow</span>
                                            </button>
                                
                                            <button class="button is-danger" @click.prevent="date = null">
                                                <b-icon icon="times"></b-icon>
                                                <span>Clear</span>
                                            </button>
                                        </b-datepicker>
                                    </b-field>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" :value="statusSelected" name="status">
            <input type="hidden" :value="prioritySelected" name="priority">
            <input type="hidden" :value="date.toISOString().slice(0, 19).replace('T', ' ')" name="due_at">

            <button class="button is-primary" style="min-width: 250px">Update Task</button>
        </form>
    </div> <!-- /.flex-container -->
@endsection

@section('scripts')
    <script>
        const today = new Date()
        var app = new Vue({
            el: '#app',
            data: {
                statusSelected: {{ $task->status }},
                prioritySelected: {{ $task->priority }},
                date: new Date('{{ $task->due_at }}'),
                tomorrow: new Date(today.getFullYear(), today.getMonth(), today.getDate() + 1),
                minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate() - 2)
            }
        })
    </script>
@endsection