@extends('layouts.app')
@include('layout/scripts')
@section('content')
    <div class="container">               
         <a href="{{URL('patients')}}" class="btn btn-dark">Go Back</a><br><br>
        @if(count($user) > 0)
        @foreach($user as $u)
        <h3>Istorija pacijenta: {{$u->name}} 
        </h3>
        {!! Form::open(['action' => ['App\Http\Controllers\HomeController@show',$u->id], 'method' => 'GET', 'enctype' => 'multipart/form-data',  'class' => 'search-form']) !!}    
       <div id="dropdown-list" class="float-right "> {!! Form::select('filterBy', array('desc' => 'date desc', 'asc' => 'date asc'),['class' => 'dropdown-list']); !!}
           </div>
        {!!Form::submit("Search",['class' => 'btn btn-primary float-right'])!!}
        {!! Form::close()!!}
        @endforeach
        @endif
        @if(count($schedules) > 0 )
            <table class="patients-table">
                <tr><th>Ime usluge</th>
                    <th>Datum obavljanja usluge: </th>
                    <th>Vise informacija: </th>
                    </tr>
                @foreach($schedules as $schedule)
                <tr>
                    <td>{{$schedule->title}}</td>
                    <td>{{$schedule->start}} - {{$schedule->end}}</td>
                    <td><a class="btn btn-info" href="{{url('dashboard/show/'.$schedule->id)}}">Vise Informacija</a></td>
                </tr>
                @endforeach
            </table>
            @else<br> 
            <h4>Pacijent nema istoriju lecenja</h4>
            @endif
            <div id="pagination" class="d-flex justify-content-center" style="margin-top:30px; font-size:22px;">{{ $schedules->links() }}</div>
    </div>
@endsection