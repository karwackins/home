@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="padding-bottom: 10px">
            <div class="col-md-12">
                <div class="card-body">
                    <form action="{{url('/events/'.$event->id)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <textarea class="form-control{{ $errors->has('event_content') ? ' is-invalid' : '' }}" name="event_content" id="event_content" cols="30" rows="5" placeholder="Co tam słychać?">{{$event->content}}</textarea>
                        @if ($errors->has('event_content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('event_content') }}</strong>
                            </span>
                        @endif
                        <button class="btn float-right" style="margin-top: 10px">Edytuj wpis</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
