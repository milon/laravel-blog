@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Posts

                            <a href="{{ url('admin/posts/create') }}" class="btn btn-default pull-right">Create New</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Author</th>
                                    <th>Published</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($posts))
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ str_limit($post->body, 60) }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->published }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">No posts available.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        {!! $posts->links() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
