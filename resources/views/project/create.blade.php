<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Project </title>
</head>
<body>
    <form action="{{ route('project.store') }}" method="post">
        @csrf
        <input type="text" name="title" placeholder="Title">
        <input type="date" name="delivery_date" placeholder="Delivery Date">
        <input type="date" name="due_date" placeholder="Due Date">
        <button type="submit">Create</button>
    </form>
</body>
</html>