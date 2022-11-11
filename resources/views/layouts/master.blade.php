<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> {{ $title ?? 'Home' }} </title>
    @vite('resources/css/app.css')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>

<body>
    <header class="w-full py-4 px-8 inline-flex justify-center space-x-10 shadow-lg">
        <a class="py-2 text-center font-semibold {{ Route::is('promotion.*') ? 'text-blue-600' : 'text-gray-500' }}" href="{{ route('promotion.index') }}">
            Promotions
        </a>
        <a class="py-2 text-center font-semibold {{ Route::is('project.*') ? 'text-blue-600' : 'text-gray-500' }}" href="{{ route('project.index') }}">
            Briefs
        </a>
    </header>
    @if ($errors->has('*'))
        <div class="text-white bg-red-600 w-full py-2 text-sm font-semibold text-center">
            {{ $errors->first() }}
        </div>
    @elseif (Session::has('success'))
        <div class="text-white bg-green-500 w-full py-2 text-sm font-semibold text-center" id="success">
            {{ Session::get('success') }}
        </div>
    @endif
    @yield('body')

    @yield('scripts')
    <script>
        setTimeout(() => {
            $('#success').hide()
        }, 2000);
    </script>
</body>
</html>
