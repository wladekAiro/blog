@extends('layouts.admin')
@section('content')
<!-- Page Heading -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="post" action="{{ route('create_article') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                       placeholder="Title">
                <small id="title" class="form-text text-muted">Provide title.</small>
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" name="body"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Main Photo/picture</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <!--    <div class="form-check">-->
            <!--        <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
            <!--        <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
            <!--    </div>-->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
