<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="{{url('/events')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="row" style="padding: 5px">
                        <input class="form-control{{ $errors->has('event_title') ? ' is-invalid' : '' }}" name="event_title" id="event_title" cols="30" rows="5" placeholder="Tytuł wydarzenia...">{{ old('event_title') }}</input>
                        @if ($errors->has('event_content'))
                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('event_content') }}</strong></span>
                        @endif
                    </div>
                    <div class="row" style="padding: 5px">
                        <textarea class="form-control{{ $errors->has('event_content') ? ' is-invalid' : '' }}" name="event_content" id="event_content" cols="30" rows="5" placeholder="Co tam słychać?">{{ old('event_content') }}</textarea>
                        @if ($errors->has('event_content'))
                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('event_content') }}</strong></span>
                        @endif
                    </div>
                    <div class="row form-group">
                        <div class="input-group" style="padding: 5px">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                       aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Wybierz plik...</label>
                            </div>

                            <input type="date" class="form-control" name="data_event" max="3000-12-31" min="1000-01-01" class="form-control" placeholder="Data">
                            <input type="date" class="form-control" name="start_date" max="3000-12-31" min="1000-01-01" class="form-control" placeholder="Data od">
                            <input type="date" class="form-control" name="end_date" max="3000-12-31" min="1000-01-01" class="form-control" placeholder="Data do">
                            <input type="text" name="budget" class="form-control" placeholder="0.00 zł">
                        </div>
                        <!-- Default unchecked -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                            <label class="custom-control-label" for="defaultUnchecked">Dodaj to wydarzenie jako zadanie do wykonania</label>
                        </div>
                    </div>
                    <button class="btn float-right" style="margin-top: 10px">Opublikuj</button>
                </form>
    </div>
</div>
    </div>
</div>
@if(Session::has('errors'))
    <script>
        $(document).ready(function(){
            $('#eventModal').modal({show: true});
        });
    </script>
@endif
