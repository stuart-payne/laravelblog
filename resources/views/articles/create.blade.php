@extends('layouts.app')
@section('content')
    <form action="/articles" method="POST" id="article" class="w-75">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description">
        </div>
        <div class="form-group">
            <label for="content">Description</label>
            <textarea class="form-control" name="content" id="content" form="article"></textarea>
        </div>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>
@endsection
