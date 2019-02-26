@extends('layouts.master')

@section('content')

<form class="col s12">
    <div class="row">
        <div class="input-field col s12">
            <input id="task2" type="text" class="validate">
            <label for="task2">Edit task</label>
        </div>
    </div>

    @include('partials.coworkers')

    <a href="" class="waves-effect waves-light btn">Edit Task</a>
</form>

@endsection