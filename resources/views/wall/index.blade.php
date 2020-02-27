@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('layouts.sidebar')
        <div class="col-md-8">
            @if(Auth::check())
                @include('events.show')
{{--                @include('events.create')--}}
            @endif

            @foreach($posts as $post)
            @include('events.include.single')
            @endforeach
            {{ $posts }}
        </div>
    </div>
</div>
@endsection
