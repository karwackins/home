 <div class="card">
        <div class="card-body">
            <h4 class="card-title"><i class="far fa-calendar-alt"></i> Najbliższe wydarzenia</h4>
            <hr>
            <table id="dt-select" class="table table" cellspacing="0" width="100%">
                <thead>
                    <th style="width: 20%"><strong>Data</strong></th>
                    <th style="width: 60%"><strong>Wydarzenie</strong></th>
                    <th style="width: 20%"><strong>Koszt</strong></th>
                </thead>
                <tbody>
                @foreach($eventsHot as $event)
                    <tr>
                        <td>{{$event->data_event}}</td>
                        <td>{{$event->content}}</td>
                        <td>{{$event->budget}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
 </div>


