@extends ('layouts.master')
@section ('posts')
    <h2>Publish a Post</h2>
    <hr>
    @include('layouts.errors')
    <form method="POST" action="/posts">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" >
        </div>
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea name="body" id="body" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Publish</button>
    </form>
@endsection
