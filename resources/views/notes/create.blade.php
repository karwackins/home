<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Your cart</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">

                <form action="{{url('/events')}}" method="POST">
                    {{ csrf_field() }}
                    <textarea class="form-control{{ $errors->has('event_content') ? ' is-invalid' : '' }}" name="event_content" id="event_content" cols="30" rows="5" placeholder="Co tam słychać?">{{ old('event_content') }}</textarea>
                    @if ($errors->has('event_content'))
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('event_content') }}</strong>
                </span>
                    @endif
                    <br>
                    <div class="form-group">
                        <div class="float-left">
                            <input name="file" type="file" class="form-control">
                        </div>
                        <div class="float-left">
                            <input type="date" class="form-control" name="data_event" max="3000-12-31" min="1000-01-01" class="form-control" placeholder="Data">
                        </div>
                        <div class="float-left">

                            <input type="text" name="budget" class="form-control" placeholder="0.00 zł">
                        </div>
                    </div>
                    <button class="btn float-right" style="margin-top: 10px">Opublikuj</button>
                </form>
            </div>

            <!--Footer-->
            <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Your cart</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
        <!--/.Content-->
    </div>
</div>
            </div>
        </div>
    </div>
</div>
