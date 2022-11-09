<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Project </title>
</head>

<body>
    <a href="{{ route('project.create') }}">Create project</a>
    <ul>
        @foreach ($projects as $project)
            <li>
                <a href="{{ route('project.edit', ['project' => $project]) }}">
                    {{ $project->title }}
                </a>
            </li>
        @endforeach
    </ul>
</body>

</html>
