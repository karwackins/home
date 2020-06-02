@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="jumbotron col-md-12">
                <h4 class="display-4">Bilans</h4>
            </div>
        </div>
    </div>
    @include('budgets.show')
@endsection
