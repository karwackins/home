@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{--            @include('layouts.sidebar')--}}
            @if(Auth::check())
            <div class="row">
                <button class="btn btn-dark-green" data-toggle="modal" data-target="#eventModal" id="note_toggle">Dodaj wydarzenie</button>
                <button class="btn btn-dark-green" data-toggle="modal" data-target="#taskModal" id="note_toggle">Dodaj zadanie</button>
                <button class="btn btn-dark-green" data-toggle="modal" data-target="#eventModal" id="note_toggle">Dodaj notatkę</button>
            </div>

            <div class="row">
                    <div id="event" class="col-md-7">
                        @include('events.show')
                        <br>
                        @foreach($events as $event)
                            @include('events/include/single')
                            <br>
                        @endforeach
                    </div>
                    <div id="task" class="col-md-5">
                        @include('tasks.show')
                        <br>
                        @include('stats.show')
                    </div>
            </div>
<!- ------------------------Modale---------------------->
                <div>
                    @include('events.create')
                </div>
                <div>
                    @include('tasks.create')
                </div>
            @endif
        </div>
    </div>
@endsection

