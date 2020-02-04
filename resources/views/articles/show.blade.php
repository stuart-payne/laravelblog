@extends('layouts.app')
@section('content')
    <div class="mx-5">
        <h1>
            {{ $article->title }}
        </h1>
        @auth
            @if(Auth::user()->id == $article->user_id)
                <a href="{{url("/articles/{$article->id}/edit")}}">Edit</a>
                <form method="post" action="/articles/{{$article->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="asText" aria-label="Left Align">Delete
                      </button>
                </form>
            @endif
        @endauth
        <p>
            {{ $article->content }}
        </p>
    </div>
    <div class="d-flex flex-column justify-content-center align-items-start">
        @foreach($comments as $comment)
            <div class="card mx-4 my-1">
                <div class="card-body">
                    <div class="card-title">
                        {{ App\User::find($comment->user_id)->name }} says:
                    </div>
                    <p class="card-text">
                        {{ $comment->content }}
                    </p>
                    @auth
                       @if(Auth::user()->id == $comment->user_id)
                            <a href="{{url("/comments/{$comment->id}/edit")}}">Edit</a>
                            <form method="post" action="/comments/{{$comment->id}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="asText">Delete</button>
                            </form>
                       @endif
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
    {{-- if logged in, create comment form --}}
    @auth
        <form class="m-4" method="POST" action="/comments" id="commentForm" style="max-width: 300px;">
            @csrf
        <input type="hidden" name="article_id" value="{{$article->id}}">
            <div class="form-group">
                <label for="content">Comment</label>
                <textarea class="form-control" name="content" id="content" rows="3" form="commentForm" required></textarea>
                @error('content')
                    <p>{{ $errors->first('content') }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    @endauth
@endsection
