<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Task </title>
</head>
<body>
    <h3> Create task </h3>
    <form action="{{ route('task.store', ['project' => $project]) }}" method="post">
        @csrf
        <input type="text" name="title" placeholder="Title"><br>
        <textarea name="description" placeholder="Description"></textarea><br>
        <input type="date" name="start_date" placeholder="Start Date"><br>
        <input type="date" name="end_date" placeholder="End Date"><br>
        <button type="submit">Create</button>
    </form>
</body>
</html>