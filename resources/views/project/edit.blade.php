<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Project </title>
</head>
<body>
    <form action="{{ route('project.update', ['project' => $project]) }}" method="post">
        @csrf
        <input type="text" name="title" placeholder="Title" value="{{ $project->title }}">
        <input type="date" name="delivery_date" placeholder="Delivery Date" value="{{ $project->delivery_date?->format('Y-m-d') }}">
        <input type="date" name="due_date" placeholder="Due Date"  value="{{ $project->due_date?->format('Y-m-d') }}">
        <button type="submit">
            Update
        </button>
    </form>
    <br>
    <br>
    <a href="{{ route('task.create', ['project' => $project]) }}">Create task</a>
    <ul>
        @foreach ($project->tasks as $task)
            <li>
                <a href="{{ route('task.edit', ['task' => $task]) }}">
                    {{ $task->title }}
                </a>
            </li>
        @endforeach
    </ul>
</body>
</html>