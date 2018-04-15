@extends('layouts.manage')

@section('content')
    <div class="container flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">New Task</h1>
            </div>
        </div>

        <hr class="m-t-0">

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
        
            <div class="columns">
                <div class="column">
                    <div class="box">
                        <div class="content">
                            <h2 class="title">Task Details:</h2>                                    
                            <div class="field">
                                <p class="control">
                                    <label for="title" class="label">Title</label>
                                    <input type="text" class="input" name="title" value="{{ old('title') }}" id="title">
                                </p>
                            </div>

                            <div class="field">
                                <p class="control">
                                    <label for="description" class="label">Description</label>
                                    <input type="text" class="input" name="description" value="{{ old('description') }}" id="description">
                                </p>
                            </div>

                            <div class="columns">
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

            <input type="hidden" :value="prioritySelected" name="priority">
            <input type="hidden" :value="date.toISOString().slice(0, 19).replace('T', ' ')" name="due_at">

            <button class="button is-primary" style="min-width: 250px">Create New Task</button>
        </form>
    </div> <!-- /.flex-container -->
@endsection

@section('scripts')
    <script>
        const today = new Date()
        var app = new Vue({
            el: '#app',
            data: {
                prioritySelected: {!! (old('priority') != '') ? old('priority') : 2 !!},
                date: new Date({{ (old('date') != '') ? '"' . old('date') . '""' : '' }}),
                tomorrow: new Date(today.getFullYear(), today.getMonth(), today.getDate() + 1),
                minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate() - 2)
            }
        })
    </script>
@endsection