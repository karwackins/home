<div class="card-body">
    <h5 class="card-title">Miesiąc: {{ $month }}</h5>
    <button class="btn btn-dark-green" data-toggle="modal" data-target="#budgetModal" id="note_toggle">Wprowadź budżet</button>
    <p class="card-text"></p>
</div>
@include('budgets.create')
<form action="{{url('budget/'.$month)}}" method="POST">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <table class="table">
        @foreach($expenses as $expense)
            <tr>
                <td><input type="text" name="name[]" class="form-control"  value="{{$expense->name}}"></td>
                <td><input type="text" name="expense[]" class="form-control"  value="{{$expense->expense}}"></td>
                <input type="hidden" name="status[]" value="0">
                <td><input type="checkbox" name="status[]" id="{{$expense->name}}" ></td>
            </tr>
        @endforeach
    </table>
    <input type="submit" class="btn btn-outline-purple" name="" id="" value="Aktualizuj">
</form>


