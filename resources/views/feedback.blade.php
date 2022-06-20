@extends('blanks.blank')

@section ('page_title', 'Send a feedback')

<head>
    <link rel="stylesheet" href="{{ url('style/create.css') }}">

    {{-- <script src="{{ url('scripts/feedback.js') }}" defer></script> --}}

</head>


@section('page_content')

<main>
    <h2 id="create_start">Send us a feedback!</h2>
    <h3 id="create_h3">Use this for bug reports and feature requests.</h3>

    <form name="feedbackForm" id="postForm" method="post" action=" {{ url('feedback/send')}} ">
        @csrf
        <div id="postStory">
            <label name="story">Tell us your feedback</label>
            <textarea id="story" name="content" placeholder="I've found a bug!" rows="10" cols="130" required></textarea>
        </div>
        <input type="submit" value="Send feedback">
    </form>
</main>

@endsection