@extends('layouts.manage')

@section('content')
    <section class="hero is-light is-fullheight m-t-m70">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-two-thirds-desktop">
                        <h1 class="title">
                            {{ $greeting . '!' }}
                        </h1>
                        <h2 class="subtitle">
                            Welcome to <b><a href="https://github.com/j-651/TaskManager" target="_blank">TaskManager</a></b>, made with <span class="icon has-text-danger"><i class="fas fa-heart"></i></span> by <b><a href="https://github.com/j-651" target="_blank">j&dash;651</a></b>
                        </h2>
                        <br>
                        <a href="{{ route('tasks.index') }}" class="button is-primary is-large" style="width:50vw">View Tasks &nbsp; <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <div class="column has-text-centered is-hidden-mobile">
                        <object data="{{ url('storage/img/icon-bw.svg') }}" type="image/svg+xml" style="height:30vh">Task Manager</object>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection