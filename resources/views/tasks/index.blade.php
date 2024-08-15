<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="card">
        <div class="card-body">
            <a href="{{ route('/') }}" class="btn btn-success">Back</a>
        </div>
    </div>
    <div class="card container mt-2">
        <div class="card-body">
            <a href="{{ route('tasks.create') }}" class="btn btn-success">Create Task</a>
        </div>
    </div>

    <div class="card container mt-2">
        <div class="card-header">
            Tasks List
        </div>
        <div class="card-body">
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Assigned To</th>
                            <th>Assigned By</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task?->title }}</td>
                                <td>{{ $task?->description }}</td>
                                <td>{{ $task?->assigned_to->name }}</td>
                                <td>{{ $task?->assigned_by->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $tasks->links() !!}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
