<div class="card-body">
    <h5 class="card-title">Miesiąc: {{ $month }}</h5>
    <button class="btn btn-dark-green" data-toggle="modal" data-target="#budgetModal" id="note_toggle">Wprowadź budżet</button>
    <p class="card-text"></p>
</div>
@include('budgets.create')
    <table class="table">
        @if(isset($expenses))
            @foreach($expenses as $expense)
                <form action="{{url('budget/'.$expense->id)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <tr>
                        <td><input type="text" name="name" class="form-control"  value="{{$expense->name}}" ></td>
                        <td><input type="text" name="amount" class="form-control"  value="{{$expense->amount}}" ></td>
                        <td><input type="submit" name="status" class="btn btn-sm {{$expense->status==1?'btn-success':'btn-danger'}}" value="{{$expense->status==1?'Tak':'Nie'}}" ></td>
                    </tr>
                </form>
            @endforeach
        @endif
    </table>


