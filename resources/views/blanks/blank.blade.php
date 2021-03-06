<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ url('style/nav.css') }}">
    <title>@yield('page_title')</title>
</head>

<body>
    <header>
        <nav>
            <div id='l_nav'>
                <h1>GIF It Up!</h1>
                <a href='{{ url('/') }}'>Home<span class='material-menu material-symbols-outlined'>home</span></a>
                <a href='{{ url('profile') }}'> {{ $username }} <span class='material-menu material-symbols-outlined'>person</span></a>
                <a href='{{ url('search') }}'>Search<span class='material-menu material-symbols-outlined'>search</span></a>
                <a href='{{ url('logout') }}'>Logout<span class='material-menu material-symbols-outlined'>logout</span></a>
                <a href='{{ url('feedback') }}' id='mmmnksss'>1000001680</a>
            </div>

            <div id='r_nav'>
                <a id='create_btn' href='{{ url('create') }}'>Post something<span id='material-add' class='material-symbols-outlined'>add</span></a>
            </div>
        </nav>
    </header>

    @yield('page_content')

</body>

</html>
