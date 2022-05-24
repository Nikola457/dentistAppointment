@extends('layouts.app')
@include('layout.error')
@include('layout.scripts')
@include('layout.success')
@section('content')
<div class="container col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-8">              
            <div class="card">
                <div class="card-header">
                    @if(Auth::user()->name === 'admin')
                    <h3>{{ __('Termini na cekanju ') }}</h3></div>
                    @else
                    <h3>{{ __('Vase zakazivanje') }}</h3></div>
                    @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($schedules)>0)
                    <table class="table-responsive table-dashboard">
                        <tr><th>Pacijent </th><th>Naslov </th><th>Opis </th><th>Pocetak Termina</th><th>Kraj Termina</th></tr>
                    @foreach($schedules as $schedule)
                    @if($schedule->scheduleDate != "")
                        <tr>
                            <td>{{$schedule->name}}</td>
                            <td>{{$schedule->subject}}</td>
                            <td>{{$schedule->message}}</td>
                            <td>{{$schedule->scheduleDate}}</a></td>
                            <td>{{$schedule->scheduleEndDate}}</a></td>
                            <td><a href="full-calender?id={{$schedule->scheduleId}}" class="btn btn-primary col-md-12">Zakazi</a></td>
                            <td> <a class="btn btn-info col-md-12 float-right" href="unscheduled/show/{{$schedule->scheduleId}}">Informacije</a></td>
                            @if(Auth::user()->name === 'admin')
                            {!! Form::open(['action' => ['App\Http\Controllers\ScheduleController@destroy', $schedule->scheduleId], 'method' => 'POST', 'enctype' => 'multipart/form-data',  'class' => 'submit-form']) !!}    
                            <td scope="col"> {{Form::hidden('_method', 'DELETE')}}
                                   {{Form::submit('Obrisi',["class" => "col-md-12 float-right btn btn-danger"])}}</td>
                                        {!! Form::close() !!}
                            @endif
                        </tr>
                        @endif
                    @endforeach
                    
                </table>
                <a class="btn btn-primary float-right" href="schedule/create">Zakazi novi termin</a>
                @else 
                <h1>Nemate zakazanih usluga</h1>
                <a class="btn btn-primary" href="schedule/create">Zakazi novi termin</a>
                @endif
                </div>   
            </div>
        </div>
    </div>
</div>
@endsection