@extends('layouts.app')
@section('content')
<form method="post" action="/comments/{{$comment->id}}" id="commentForm">
        @csrf
        @method('put')
        <input type="hidden" name="article_id" value="{{$comment->article_id}}">
        <div class="form-group">
            <label for="content">Edit</label>
            <textarea
                class="form-control"
                name="content"
                id="content" rows="3"
                form="commentForm"
                required>{{$comment->content}}</textarea>
            @error('content')
                <p>{{ $errors->first('content') }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
@endsection
