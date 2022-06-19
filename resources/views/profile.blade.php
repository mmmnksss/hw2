@extends('blanks.blank')

@section ('page_title', "$username's profile")

<head>
    <link rel="stylesheet" href="{{ url('style/home.css') }}">
    <link rel="stylesheet" href="{{ url('style/posts.css') }}">

    <script src="{{ url('scripts/profile.js') }}" defer></script>
</head>


@section('page_content')

<main class="fixed">
    <section id="feed">
    </section>
</main>

@endsection