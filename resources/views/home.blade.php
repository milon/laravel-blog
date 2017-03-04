@extends('layouts.app')

@php
    if(Auth::user()->is_admin) {
        $className = 'col-md-3';
    } else {
        $className = 'col-md-4';
    }
@endphp

@section('content')
<div class="container">
    <div class="row">

        <div class="{{ $className }}">
            <div class="panel panel-default">
                <div class="panel-heading">Posts</div>

                <div class="panel-body">
                    <h1>{{ $posts }}</h1>
                </div>
            </div>
        </div>

        <div class="{{ $className }}">
            <div class="panel panel-default">
                <div class="panel-heading">Comments</div>

                <div class="panel-body">
                    <h1>{{ $comments }}</h1>
                </div>
            </div>
        </div>

        <div class="{{ $className }}">
            <div class="panel panel-default">
                <div class="panel-heading">Tags</div>

                <div class="panel-body">
                    <h1>{{ $tags }}</h1>
                </div>
            </div>
        </div>

        @if (Auth::user()->is_admin)
            <div class="{{ $className }}">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>

                    <div class="panel-body">
                        <h1>{{ $users }}</h1>
                    </div>
                </div>
            </div>
        @endif


    </div>
</div>
@endsection
