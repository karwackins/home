@extends('../layouts.app')
@section('content')
<div class="modal fade" id="eventModalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Karta wydarzenia <strong>{{$event->title}}</strong></h4>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="card">
        <div class="card-body">
            <table id="dt-select" class="table table" cellspacing="0" width="100%">
                <thead>
                    <th style="width: 35%"><strong>Data wydarzenia</strong></th>
                    <th style="width: 50%"><strong>Szczegóły</strong></th>
                    <th style="width: 15%"><strong>Koszt</strong></th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$event->start_date}} - {{$event->end_date}}</td>
                        <td>{{$event->content}}</td>
                        <td>{{$event->budget}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
                    <a type="button" class="btn btn-primary" href="{{url('/home')}}">Powrót</a>
 </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#eventModalShow').modal({show: true});
    });
</script>
@endsection

