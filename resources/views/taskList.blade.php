@extends('layouts.main')

@section('content')
    <div class="container sectionContainer">
        @include('errors')

        <form action="/taskCreate" method="POST" class="form-horizontal">
        {{ csrf_field() }}

            <div class="form-group">
                <div class="row">
                    <label for="task" class="col">New task</label>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="col">
                        <button type="submit" class="btn btn-default">
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="container sectionContainer">
        <div class="row">
            <div class="col">
                Task list
            </div>
        </div>
        @if (count($tasks) == 0)
            <div class="row">
                <div class="col">
                    <div class="emptyList">
                        The list is empty
                    </div>
                </div>
            </div>
        @endif
        @foreach ($tasks as $task)
            <div class="row">
                @if ($task->completed)
                    <div class="col">
                        <div class="completed">
                            <div>
                                {{ $task->name }}
                            </div>
                            <div class="taskButton">
                                <form action="/taskDelete/{{ $task->id }}" method="POST">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col">
                        <div class="toDo">
                            <div>
                                {{ $task->name }}
                            </div>
                            <div class="taskButton">
                                <form action="/taskComplete/{{$task->id}}" method="POST" class="form-horizontal">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-default">
                                        Complete
                                    </button>
                                </form>
                            </div>
                            <div class="float-right">
                                <form action="/taskDelete/{{ $task->id }}" method="POST">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endsection