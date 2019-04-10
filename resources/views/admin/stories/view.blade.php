@extends('layouts.admin')
@section('content')
<!-- Page Heading -->
<div class="col-md-12 col-sm-6 col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3>{{ $article['title'] }}</h3>
            </div>
            {{ $article['body'] }}
        </div>
    </div>
</div>
@endsection
