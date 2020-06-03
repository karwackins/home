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

            <div class="row mt-3">
                <div id="calendar" class="col-md-7">
                    @include('fullcalender')
                </div>
                    <div id="task" class="col-md-5">
                        @include('tasks.show')
                    </div>
            </div>
<!- ------------------------Modale---------------------->
                <div>
                    @include('events.create')
                </div>
                <div>
                    @include('tasks.create')
                </div>
                <div>

                </div>
            @endif
        </div>
    </div>
@endsection

