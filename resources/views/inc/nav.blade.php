<nav class="navbar is-info has-shadow">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ url('/') }}">
                <object data="{{ url('storage/img/full-logo.svg') }}" type="image/svg+xml">Task Manager</object>
            </a>

            <div class="navbar-burger burger" id="main-navbar-burger" data-target="mainNavbar">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    
        <div id="mainNavbar" class="navbar-menu">
            <div class="navbar-end">
                <a class="navbar-item tooltip-bottom" href="{{ route('tasks.index') }}" data-tooltip="My Tasks">
                    <span class="icon is-medium"><i class="fas fa-tasks fa-2x"></i></span>
                    <span class="is-hidden-desktop m-l-5">My Tasks</span>
                </a>
                <a class="navbar-item tooltip-bottom" href="{{ route('tasks.create') }}" data-tooltip="New Task">
                    <span class="icon is-medium"><i class="fas fa-plus-circle fa-2x"></i></span>
                    <span class="is-hidden-desktop m-l-5">New Task</span>
                </a>
            </div>         
        </div>
    </div>
</nav>