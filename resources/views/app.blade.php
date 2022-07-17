<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <title>Laravel CRUD</title>
    </head>
    <body>
        <div class="container">
            <h1>Todos</h1>
            <hr>

            <h2>Add new task</h2>
            <hr>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('todos') }}" method="POST">
                @csrf
                <input type="text" class="form-control" name="task" placeholder="Add new task" autofocus>
                <button class="btn btn-primary" type="submit">Store</button>
            </form>


            <h2>Pending tasks</h2>
            <hr>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <ul class="list-group">
                @foreach($todos as $todo)
                    <li class="list-group-item">
                        {{ $todo->task }}

                        <button
                            class="btn btn-primary"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapse-{{ $loop->index }}"
                            aria-expanded="false">
                            Edit
                        </button>

                        <form action="{{ route('todos.delete', $todo->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>

                        <form action="{{ route('todos.done', $todo->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-success" type="submit">Done</button>
                        </form>

                        <div class="collapse mt-2" id="collapse-{{ $loop->index }}">
                            <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="text" name="task" value="{{ $todo->task }}">
                                <button class="btn btn-secondary" type="submit">Update</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>


            <h2>Completed Tasks</h2>
            <hr>
            <ul class="list-group">
                @foreach($todosDoned as $todo)
                    <li class="list-group-item">
                        {{ $todo->task }}
                    </li>
                @endforeach
            </ul>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>
