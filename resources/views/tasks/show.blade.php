 <div class="card">
        <div class="card-body">
            <h4 class="card-title"><i class="far fa-check-square"></i> Zadania do wykonania</h4>
            <hr>
            <table id="dt-select" class="table table-sm" cellspacing="0" width="100%">
                <tbody>
{{--                @foreach($events as $event)--}}
{{--                    <tr>--}}
{{--                        <td>{{$event->data_event}}</td>--}}
{{--                        <td>{{$event->content}}</td>--}}
{{--                        <td>{{$event->budget}}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
                @foreach($tasks as $task)
                    <tr class="table-{{$task->status==1?'success':'light'}}">
                            <td style="text-align: center; width: 2%">
                                <form action="{{ url('tasks/'.$task->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" name="status" value="1">
                                    <button type="submit" class=" btn btn-primary btn-sm"><i class="far fa-check-circle fa-2x"></i></button>
                                </form>
                            </td>

                            <td style="vertical-align: middle">{{$task->content}}</td>
                    </tr>
                @endforeach
                @foreach($tasksDone as $taskd)
                    <tr class="table-success">
                            <td style="text-align: center; width: 5%">
                                <i class="far fa-smile green-text fa-2x"></i>
                            </td>
                            <td style="vertical-align: middle"><s>{{$taskd->content}}</s></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
 </div>


{{--<div class="row">--}}
{{--    <div class="card">--}}
{{--        <div class="card-body">--}}
{{--            <h4 class="card-title"><i class="far fa-calendar-alt"></i> Najbliższe wydarzenia</h4>--}}
{{--            <hr>--}}
{{--            <table id="dt-select" class="table table" cellspacing="0" width="100%">--}}
{{--                <thead></thead>--}}
{{--                <tbody>--}}
{{--                @foreach($tasks as $task)--}}
{{--                    <tr class="table-{{$task->status==1?'success':'light'}}">--}}
{{--                        <td>--}}
{{--                            <form action="{{ url('tasks/'.$task->id) }}" method="POST">--}}
{{--                                {{ csrf_field() }}--}}
{{--                                {{ method_field('PUT') }}--}}
{{--                                <input type="hidden" name="status" value="1">--}}
{{--                                @if($task->status == 1)--}}
{{--                                    <button type="submit" class="btn btn-outline-success btn-rounded waves-effect"><i class="fas fa-cogs pr-2"--}}
{{--                                                                                                                      aria-hidden="true"></i>Success</button>--}}
{{--                                @else--}}
{{--                                    <button class="btn btn-sm btn-primary" type="submit"><ion-icon name="checkmark-circle-outline"></ion-icon></button>--}}
{{--                                @endif--}}

{{--                            </form>--}}
{{--                        </td>--}}
{{--                        <td>{{$task->content}}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
