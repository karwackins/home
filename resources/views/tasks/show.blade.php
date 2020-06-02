 <div class="card">
        <div class="card-body">
            <h4 class="card-title"><i class="far fa-check-square"></i> Zadania do wykonania</h4>
            <hr>
            <table id="dt-select" class="table table-sm" cellspacing="0" width="100%">
                <tbody>
                @foreach($tasks as $task)
                    <tr class="table-{{$task->priority==1?'danger':'warning'}}">
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
