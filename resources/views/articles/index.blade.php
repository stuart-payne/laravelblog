@extends('layouts.app')
@section('content')
    <div class="d-flex flex-wrap justify-content-center m-4">
        @foreach($articles as $article)
            <div class="card m-1 p-2">
                <h4>
                    <a href="{{ url("/articles/{$article->id}") }}">{{ $article->title }}</a>
                </h4>
                <p>
                    {{ $article->description }}
                </p>
            </div>
        @endforeach
    </div>
@endsection
