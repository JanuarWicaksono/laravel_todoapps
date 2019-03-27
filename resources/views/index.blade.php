@extends('layouts.master')

@section('content')
<table>
    <thead>
        <tr>
            <th>Task</th>
            @isAdmin
            <th>Assigned To</th>
            @endisAdmin
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($tasks as $task)
        <tr>
            <td>
                <a href="{{ route('updateStatus', $task->id) }}">
                    @if (!$task->status)
                    {{ $task->content }}
                    @else
                    <strike class="grey-text">{{ $task->content }}</strike>
                    @endif
                </a>
            </td>
            @isAdmin
            <td>{{ $task->user->name }}</td>
            @endisAdmin
            <td><a title="edit" href="{{ route('edit', $task->id) }}"><i class="small material-icons">edit</i></a></td>
            <td><a title="delete" onclick="return confirm('Delete?')" href="{{ route('delete', $task->id) }}"><i class="small material-icons">delete_forever</i></a></td>
        </tr>
        @endforeach

    </tbody>
</table>


{{ $tasks->links('vendor.pagination.materializecss') }}
{{-- <ul class="pagination">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    <li class="active"><a href="#!">1</a></li>
    <li class="waves-effect"><a href="#!">2</a></li>
    <li class="waves-effect"><a href="#!">3</a></li>
    <li class="waves-effect"><a href="#!">4</a></li>
    <li class="waves-effect"><a href="#!">5</a></li>
    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
</ul><br><br> --}}

<form method="POST" action="{{ route('store') }}" class="col s12">
    @csrf
    <div class="row">
        <div class="input-field col s12">
            <input id="task" name="task" type="text" class="validate">
            <label for="task">New task</label>
        </div>
    </div>

    @include('partials.coworkers')

    <button type="submit" class="waves-effect waves-light btn">Add New Task</button>
</form><br><br>

@isWorker
<form method="POST" action="{{ route('sendInvitation') }}" class="col s12">
    @csrf
    <div class="input-field">
        <select name="admin">
            <option value="" disabled selected>Send invitation to :</option>
            @foreach ($coworkers as $coworker)
            <option value="{{ $coworker->id }}">{{ $coworker->name }}</option>
            @endforeach
        </select>
        <label>Asigned task</label>
    </div>

    <button type="submit" class="waves-effect waves-light btn">Send invitation</button>
</form><br><br>
@endisWorker

@isAdmin
<ul class="collection with-header">
    <li class="collection-item">
        <h4>My Coworkers</h4>
    </li>
    @foreach ($coworkers as $coworker)
    <li class="collection-item">{{ $coworker->worker->name }} <a href="{{ route('deleteWorker', $coworker->id) }}"
            class="secondary-content">delete</a></li>
    @endforeach
</ul>
@endisAdmin

@endsection
