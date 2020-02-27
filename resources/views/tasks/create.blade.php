<div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Karta wydarzenia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
        <form action="{{url('/tasks')}}" method="POST">
            {{ csrf_field() }}
            <input class="form-control{{ $errors->has('task_content') ? ' is-invalid' : '' }}" name="task_content" id="post_content" placeholder="Dzisiaj zrobię ...">{{ old('post_content') }}</input>
            @if ($errors->has('task_content'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('task_content') }}</strong>
                </span>
            @endif
            <br>
            <div class="form-group">
                <div class="float-left">
                    <input type="date" class="form-control" name="data_event" max="3000-12-31" min="1000-01-01" class="form-control" placeholder="Data">
                </div>
                <div class="float-left">
                    <select class="custom-select" name="priority" id="priority">
                        <option value="1">Wysoki</option>
                        <option value="2" selected>Średni</option>
                        <option value="3">Niski</option>
                    </select>
                </div>
            </div>
            <button class="btn float-right" style="margin-top: 10px">Zrobie to!</button>
        </form>
            </div>
        </div>
    </div>
</div>
