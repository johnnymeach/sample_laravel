@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                <div class="panel-heading"><a class="btn btn-small btn-primary" href="{{ URL::to('posts/create') }}">Create New Post</a></div>

                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td class="col-md-1">PostID</td>
                                <td class="col-md-3">Title</td>
                                <td class="col-md-6">Body</td>
                                <td class="col-md-2">Detail</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->title }}</td>
                                <td>{{ $value->body }}</td>
                                <td>
                                    <a class="btn btn-small btn-success" href="{{ URL::to('posts/' . $value->id) }}">Show post details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
@endsection
