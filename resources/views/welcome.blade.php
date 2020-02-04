@extends('layouts.app')
@section('content')
<div class="jumbotron w-100">
    <h1 class="title display-1 text-center"> {{config('app.name')}} </h1>
    <p class="lead text-center "> Welcome to the premier blogging website. The place to show the world your realised dreams! </p>
    <hr class="my-4">
    <p class="text-center mb-4 ">Create an account today and start your journey of discovery!</p>
</div>
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
<div class="d-flex justify-content-center m-4">
<h3><a href="{{ url("/articles") }}">View more articles here!</a></h3>
</div>
@endsection
