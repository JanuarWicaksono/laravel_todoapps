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
        <tr>
            <td><a href="">Slim down to 10 kg</a></td>
            @isAdmin
            <td>Januar Wicaksono</td>
            @endisAdmin
            <td><a title="edit" href=""><i class="small material-icons">edit</i></a></td>
            <td><a title="delete" href=""><i class="small material-icons">delete_forever</i></a></td>
        </tr>
    </tbody>
</table>

<ul class="pagination">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    <li class="active"><a href="#!">1</a></li>
    <li class="waves-effect"><a href="#!">2</a></li>
    <li class="waves-effect"><a href="#!">3</a></li>
    <li class="waves-effect"><a href="#!">4</a></li>
    <li class="waves-effect"><a href="#!">5</a></li>
    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
</ul>

<form class="col s12">
    <div class="row">
        <div class="input-field col s12">
            <input id="task" type="text" class="validate">
            <label for="task">New task</label>
        </div>
    </div>
    
    @include('partials.coworkers')

    <a href="" class="waves-effect waves-light btn">Add New Task</a>
</form><br><br><br>

@isWorker
<form action="" class="col s12">
    <div class="input-field">
        <select>
            <option value="" disabled selected>Send invitation to :</option>
            <option value="1">Januar Wicaksono</option>
            <option value="2">John Meydi</option>
            <option value="3">Micelle Rodri</option>
        </select>
        <label>Asigned task</label>
    </div>

    <a href="" class="waves-effect waves-light btn">Send invitation</a>
</form>
@endisWorker

<ul class="collection with-header">
    <li class="collection-item"><h4>My Coworkers</h4></li>
    <li class="collection-item">Putria Vanessa Meydi <a href="#!" class="secondary-content">delete</a></li>
    <li class="collection-item">Intan Rizky Amalia  <a href="#!" class="secondary-content">delete</a></li>
    <li class="collection-item">Septian Diwibowo <a href="#!" class="secondary-content">delete</a></li>
    <li class="collection-item">Meydi Vanessa <a href="#!" class="secondary-content">delete</a></li>
</ul>

<form class="col s12">
    <div class="row">
        <div class="input-field col s12">
            <input id="task2" value="task content to edit" type="text" class="validate">
            <label for="task2">Edit task</label>
        </div>
    </div>
    <a href="" class="waves-effect waves-light btn">Edit Task</a>
</form>

@endsection