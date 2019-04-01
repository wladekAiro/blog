@extends('layouts.admin')
@section('content')
<!-- Page Heading -->
<form>
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">
        <small id="emailHelp" class="form-text text-muted">Provide title.</small>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Main Photo/picture</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Body</label>
        <textarea class="form-control" id="exampleFormControlTextarea1"></textarea>
    </div>
<!--    <div class="form-check">-->
<!--        <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
<!--        <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
<!--    </div>-->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
