 <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('budget/1') }}">Styczeń</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('budget/2') }}">Luty</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('budget/3') }}">Marzec</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('budget/4') }}">Kwiecień</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('budget/5') }}">Maj</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('budget/06') }}">Czerwiec</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('budget/7') }}">Lipiec</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('budget/8') }}">Sierpień</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('budget/9') }}">Wrzesień</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('budget/10') }}">Październik</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('budget/11') }}">Listopad</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('budget/12') }}">Grudzień</a>
                            </li>
                        </ul>
                    </div>
                    @include('budgets.single')
                </div>
            </div>
        </div>
    </div>

