@extends('layouts.app')
@section('content')
<form action="/articles/{{$article->id}}" method="POST" id="article" class="w-75">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$article->title}}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" value="{{$article->description}}">
        </div>
        <div class="form-group">
            <label for="content">Description</label>
        <textarea class="form-control" name="content" id="content" form="article">{{$article->content}}</textarea>
        </div>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>
@endsection
