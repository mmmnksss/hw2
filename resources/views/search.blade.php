@extends('blanks.blank')

@section ('page_title', "Search")

<head>
    <link rel="stylesheet" href="{{ url('style/home.css') }}">
    <link rel="stylesheet" href="{{ url('style/posts.css') }}">

    <script src="{{ url('scripts/search.js') }}" defer></script>
</head>


@section('page_content')

<form id="search_form">
    <input id="search_fieldbox" type="text" placeholder="Want to search something?">
    <input id="search_button" type="submit" value="Search post(s)">
</form>

<main class="fixed">
    <section id="feed">
    </section>
</main>

@endsection