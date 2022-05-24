@extends('layouts.app')
@include('layout.error')
@include('layout.scripts')
@include('layout.success')
@section('content')

    </div>
    <div class="container col-md-10">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Auth::user()->name != 'admin')
                    @if ($param == '' || $param == 'e')
                        @if ($numberOfSched == 1)
                            <h5 class="alert alert-primary">Imate jos {{ $numberOfSched }} termin na cekanju</h5>
                        @else
                            <h5 class="alert alert-primary">Imate jos {{ $numberOfSched }} termina na cekanju</h5>
                        @endif
                    @else
                        @if ($numberOfSched >= 0)
                            <h5 class="alert alert-primary">Imate {{ $numberOfSched }} termin zakazan </h5>
                        @else
                            <h5 class="alert alert-primary">Imate {{ $numberOfSched }} termina zakazana </h5>
                        @endif
                    @endif
                @endif
                <div class="card">
                    <div class="card-header">
                        @if (Auth::user()->name === 'admin')
                            <h3>{{ __('Termini svih pacijenata') }}</h3>
                        @else
                            @if (count($sched) == 0)
                                <h3>{{ __('Vasi termini su na cekanju') }}</h3>
                            @else
                                <h3>{{ __('Potvrdjeni termini') }}</h3>
                            @endif
                        @endif
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (count($sched) > 0)
                            @if (Auth::user()->name !== 'admin')
                                {!! Form::open(['action' => ['App\Http\Controllers\HomeController@index'], 'method' => 'GET', 'enctype' => 'multipart/form-data', 'class' => 'search-form']) !!}
                                <div id="dropdown-list" class="float-right "> {!! Form::select('unschedule', ['e' => 'zakazani termini', 's' => 'nezakazani termini'], ['class' => 'dropdown-list']) !!}
                                </div>
                                {!! Form::submit('Search', ['class' => 'btn btn-primary float-right']) !!}
                                {!! Form::close() !!}
                            @endif
                            <table class="table-responsive table-dashboard">
                                <tr>
                                    <th>Ime pacijenta</th>
                                    <th>Naslov</th>
                                    <th>Poruka</th>
                                    <th>Pocetni datum</th>
                                    <th>Krajnji datum</th>
                                    @if (Auth::user()->name === 'admin')
                                    <th>Telefon</th>
                                    @endif
                                </tr>
                                @foreach ($sched as $s)
                                    <tr>
                                        <td scope="col">{{ $s->name }}</td>
                                        <td scope="col">{{ $s->title }}</td>
                                        <td scope="col">{{ $s->description }}</td>
                                        @if ($s->start == '')
                                        @if(Auth::user()->name == 'admin')
                                            <td scope="col"><a href="full-calender?id={{ $s->id }}"
                                                    class="btn btn-primary col-md-6">Dodaj termin</a></td>
                                            @endif
                                        @else
                                            <td scope="col">{{ $s->start }}</td>
                                            <td scope="col">{{ $s->end }}</td>
                                            @if (Auth::user()->name === 'admin')
                                            <td><a href="tel:{{$s->phone}}"><img src="images/phone.png" class="phone-img"></a></td>
                                            @endif
                                        @endif
                                        <td scope="col"> <a class="btn btn-info col-md-12 float-right"
                                                href="dashboard/show/{{ $s->id }}">Informacije</a></td>
                                        @if (Auth::user()->name === 'admin')
                                            {!! Form::open(['action' => ['App\Http\Controllers\HomeController@destroy', $s->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'submit-form']) !!}
                                            <td scope="col"> {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Obrisi', ['class' => 'col-md-12 float-right btn btn-danger']) }}
                                            </td>
                                            {!! Form::close() !!}
                                        @endif
                                       
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            @if (count($sched) > 0)
                                <table class="table-dashboard">
                                    <tr>
                                        <th>Naslov</th>
                                        <th>Poruka</th>
                                        <th>Pocetni zeljeni termin</th>
                                        <th>Krajnji zeljeni termin</th>
                                    </tr>
                                    @foreach ($sched as $s)
                                        <tr>
                                            <td scope="col">{{ $s->subject }}</td>
                                            <td scope="col">{{ $s->message }}</td>
                                            <td scope="col">{{ $s->scheduleDate }}</td>
                                            <td scope="col">{{ $s->scheduleEndDate }}</td>
                                            
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <h1>Nemate zakazanih usluga</h1>
                            @endif
                        @endif


                        <a class="btn btn-primary float-right" href="schedule/create" id="termin">Zakazi novi termin</a>

                        <div id="pagination" class="d-flex justify-content-center" style="margin-top:30px; font-size:22px;">
                            {{ $sched->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
