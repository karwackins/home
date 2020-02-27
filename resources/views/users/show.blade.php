@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
{{--            @include('layouts.sidebar')--}}
            <div class="col-md-12">

            @if(Auth::check())
                    <button class="btn btn-success" id="event_toggle">Dodaj wydarzenie</button>
                    <button class="btn btn-success" id="task_toggle">Dodaj zadanie</button>
                    <button class="btn btn-success disabled" id="note_toggle">Dodaj notatkę</button>
                    <div id="event">
                        @include('events.show')
                    </div>
                    <div id="post" style="display: none">
                        @include('events.create')
                    </div>
                    <div id="task" style="display: none">
                        @include('tasks.create')
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                    @foreach($events as $event)
                        @include('events.include.single')
                    @endforeach
            </div>
            {{ $events }}
        </div>
    </div>
@endsection

