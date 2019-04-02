@extends('layouts.admin')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Stories</h1>
    <a href="/articles/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-newspaper fa-sm text-white-50"></i> Create Story</a>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Articles</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Date submitted</th>
                    <th>Title</th>
                    <th>Writer</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Date submitted</th>
                    <th>Title</th>
                    <th>Writer</th>
                    <th>Status</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>{{ $article['created_at'] }}</td>
                    <td>{{ $article['title'] }}</td>
                    <td>Tokyo</td>
                    <td>63</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
