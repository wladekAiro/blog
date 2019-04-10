@extends('layouts.admin')
@section('content')
<!-- Page Heading -->
<div class="col-md-10 col-sm-5 col-lg-10">
    <div class="card">
        <div class="card-title">
            {{ article['title'] }}
        </div>
        <div class="card-body">
            {{ article['body'] }}
        </div>
    </div>
</div>
@endsection
