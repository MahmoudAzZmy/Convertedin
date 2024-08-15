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
        <div class="card-header">
            Create Task
        </div>
        <div class="card-body">
            <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row form-group">
                    <div class="col-6">

                        <label for="title" class="required">Title </label>
                        <input type="text" name="title" id="title" required class="form-control"
                            placeholder="Enter Task Title">
                    </div>
                    <div class="col-6">
                        <label for="description" class="required">Description</label>
                        <textarea name="description" id="description" cols="3" rows="3" placeholder="Enter Task Description"
                            class="form-control" required></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-6">
                        <label for="assigned_to_id" class="required">Assigned To</label>
                        <select name="assigned_to_id" class="form-control" id="assigned_to_id">
                            @foreach ($employees as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="assigned_by_id" class="required">Assigned By</label>
                        <select name="assigned_by_id" class="form-control" id="assigned_by_id">
                            @foreach ($admins as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="btn btn-success" type="submit">SAVE</button>
            </form>

        </div>
    </div>
</body>

</html>
