@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $post->title }} - <small>by {{ $post->user->name }}</small>

                        <span class="pull-right">
                            {{ $post->created_at->toDayDateTimeString() }}
                        </span>
                    </div>

                    <div class="panel-body">
                        <p>{{ $post->body }}</p>
                        <p>
                            Category: <span class="label label-success">{{ $post->category->name }}</span> <br>
                            Tags:
                            @forelse ($post->tags as $tag)
                                <span class="label label-default">{{ $tag->name }}</span>
                            @empty
                                <span class="label label-danger">No tag found.</span>
                            @endforelse
                        </p>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Write your comment</div>

                    <div class="panel-body">
                        
                    </div>
                </div>

                @forelse ($post->comments as $comment)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ $comment->user->name }} says...

                            <span class="pull-right">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>

                        <div class="panel-body">
                            <p>{{ $comment->body }}</p>
                        </div>
                    </div>
                @empty
                    <div class="panel panel-default">
                        <div class="panel-heading">Not Found!!</div>

                        <div class="panel-body">
                            <p>Sorry! No comment found for this post.</p>
                        </div>
                    </div>
                @endforelse

            </div>

        </dev>
    </dev>
@endsection
