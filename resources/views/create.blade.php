@extends('blanks.blank')

@section ('page_title', 'Create a post')

<head>
    <link rel="stylesheet" href="{{ url('style/create.css') }}">

    <script src="{{ url('scripts/create.js') }}" defer></script>
</head>


@section('page_content')

<main>
    <h2 id="create_start">First off, choose a nice GIF (or don't, it's up to you)</h2>
    <h3 id="create_h3">Leave the box empty to get trending GIFs</h3>
    <form id="tenor_search">
        <input id="tenor_fieldbox" type="text" placeholder="Search for a GIF on Tenor">
        <input id="tenor_button" type="submit" value="I'm feeling lucky">
        <div id="found_gifs">
        </div>
        <div id="confirm_box" class="success hidden">The GIF you last clicked has been selected.</div>
    </form>
    <h2 id="create_start">And now, create your post</h2>
    <form name="postForm" id="postForm" method="post">
        <div id="postName">
            <label name="title">Choose an awesome title</label>
            <input type="text" id="title" name="title" placeholder="This is a test" required>
        </div>
        <div id="postStory">
            <label name="story">Add a wonderful story</label>
            <textarea id="story" name="story" placeholder="Lorem ipsum dolor sit amet" rows="10" cols="130" required></textarea>
        </div>
        <input type="hidden" id="tenorURL" name="tenorURL" value="">
        <input type="submit" value="Upload your post">

        <?php
        // if (isset($success)) echo '<div class="post_success">Your post has been published!</div>';
        // else if ($success = false) echo "<div class='post_error'>Sorry, your post couldn't go through. Please try again.</div>";
        ?>
    </form>


    <form action="">

    </form>
</main>

@endsection