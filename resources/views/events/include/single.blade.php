<div class="card">
    <div class="card-body">
        @if(Auth::check() && $event->user_id === Auth::id())
             @include('events.include.dropdown')
        @endif
        <div class="float-left" style="margin-right: 5px">
             <img src="{{ url('/user-avatar/'.$event->user->id.'/50') }}" alt="" class="img-responsive img-thumbnail">
        </div>
        <div>
            <strong>{{$event->user->name}}</strong> <br> <small><a href="{{ url('/events/'.$event->id) }}">{{ $event->created_at }}</a></small>
        </div>
            <p>{{ $event->content }}</p>
    </div>
</div>

