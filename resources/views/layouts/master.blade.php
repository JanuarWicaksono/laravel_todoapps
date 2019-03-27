<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>To-do List Applications</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>

<body>

    <div class="container">


        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <p>Logged As <b>{{ Auth::user()->name }}</b> <button class="waves-effect waves-light btn">Logout</button>
            </p>
        </form>

        @isAdmin
        @if ($invitations->count() > 0)
        <ul class="collapsible">
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">person_add</i>
                    Invitations
                    <span class="new badge red">4</span>
                </div>
                <div class="collapsible-body">
                    @foreach ($invitations as $invitation)
                    <p>
                        <span class="red-text"><b> {{ $invitation->worker->name }} </b></span>
                        <a href="{{ route('acceptInvitation', ['id' => $invitation->id]) }}">Accept</a>
                        | 
                        <a href="{{ route('denyInvitation', ['id' => $invitation->id]) }}">Deny</a>
                    </p>
                    @endforeach
                </div>
            </li>
        </ul>
        @endif
        @endisAdmin

        <h1 class="center-align green-text text-darken-4">
            To-do list
        </h1>

        @yield('content')


    </div>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.collapsible').collapsible();

            $('select').formSelect();
        });

    </script>

</body>

</html>
