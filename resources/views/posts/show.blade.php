@extends ('layouts.master')
@section ('posts')
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->body }}</p>
@endsection
