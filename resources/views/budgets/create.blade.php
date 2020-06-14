<div class="modal fade" id="budgetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Budżet miesięczny</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <form action="{{url('/budget')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="row" style="padding: 5px">
                        <div class="col-md-12">
                            <label for="">Miesięczny przychód</label>
                            <input class="form-control{{ $errors->has('budget_proceeds') ? ' is-invalid' : '' }}" name="budget_proceeds" id="budget_proceeds" cols="30" rows="5" placeholder="0.00 zł">{{ old('budget_proceeds') }}</input>
                            @if ($errors->has('event_content'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('budget_proceeds') }}</strong></span>
                            @endif
                        </div>
                    </div>
{{--                    <div class="row" style="padding: 5px">--}}
{{--                        <input class="form-control{{ $errors->has('budget_savings') ? ' is-invalid' : '' }}" name="budget_savings" id="budget_savings" cols="30" rows="5" placeholder="Co tam słychać?">{{ old('budget_savings') }}</input>--}}
{{--                        @if ($errors->has('event_content'))--}}
{{--                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('budget_savings') }}</strong></span>--}}
{{--                        @endif--}}
{{--                    </div>--}}
                    <div class="row">
                        <div class="container">
                            <div>
                                <label for="">Stałe wydatki</label>
                                <table id="myTable" class=" table order-list-const">
                                    <thead>
                                    <tr>
                                        <td>Wydatek</td>
                                        <td>Kwota</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(Session::has('message'))
                                        <p class="alert alert-info">{{ Session::get('message') }}</p>
                                    @endif
{{--                                    <tr>--}}
{{--                                        <td style="width: 50%">--}}
{{--                                            <input type="text" name="nameC[]" class="form-control" placeholder="Wydatek" />--}}
{{--                                        </td>--}}
{{--                                        <td style="width: 40%">--}}
{{--                                            <input type="text" name="amountC[]"  class="form-control" placeholder="0.00 zł"/>--}}
{{--                                        </td>--}}
{{--                                        <td style="width: 10%"><a class="deleteRow"></a>--}}

{{--                                        </td>--}}
{{--                                    </tr>--}}
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="5" style="text-align: left;">
                                            <input type="button" class="btn btn-outline-dark-green btn-lg btn-block " id="addrowConstExp" value="Dodaj wydatek" />
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                    </tfoot>
                                </table>
                        </div>
                        <div>
                            <label for="">Planowane wydatki</label>
                            <table id="myTable" class=" table order-list-plan">
                                <thead>
                                <tr>
                                    <td>Wydatek</td>
                                    <td>Kwota</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5" style="text-align: left;">
                                        <input type="button" class="btn btn-outline-dark-green btn-lg btn-block " id="addrowPlanExp" value="Dodaj wydatek" />
                                    </td>
                                </tr>
                                <tr>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        </div>
                    </div>
                    <div class="row form-group">
                    </div>
                    <button class="btn float-right" style="margin-top: 10px">Zapisz</button>
                </form>
            </div>
        </div>
    </div>
</div>
@if(Session::has('errors'))
    <script>
        $(document).ready(function(){
            $('#budgetModal').modal({show: true});
        });
    </script>
@endif
