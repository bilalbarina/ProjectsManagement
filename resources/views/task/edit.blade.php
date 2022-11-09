<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Project </title>
</head>
<body>
    <form action="{{ route('task.update', ['task' => $task]) }}" method="post">
        @csrf
        <input type="text" name="title" placeholder="Title" value="{{ $task->title }}"><br>
        <textarea name="description" placeholder="Description">{{ $task->description }}</textarea><br>
        <input type="date" name="start_date" placeholder="Start Date" value="{{ $task->start_date?->format('Y-m-d') }}"><br>
        <input type="date" name="end_date" placeholder="End Date" value="{{ $task->end_date?->format('Y-m-d') }}"><br>
        <button type="submit">
            Update
        </button>
    </form>
</body>
</html>