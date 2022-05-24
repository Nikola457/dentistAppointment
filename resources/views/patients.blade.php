@extends('layouts.app')
@include('layout/scripts')
@section('content')
    <div class="container">

        @if(count($users) > 0 )
        <h1>Pacijenti</h1>
        {!! Form::open(['action' => 'App\Http\Controllers\HomeController@showAllPatients', 'method' => 'GET', 'enctype' => 'multipart/form-data',  'class' => 'search-form']) !!}    
        {!!Form::submit("Search",['class' => 'btn btn-primary float-right', 'id' => 'search-input-patients'])!!}
        {!! Form::text('searchInput','', ["placeholder" => "Pretrazi", 'class' => 'float-right' , 'id' => 'searchInput'])!!}

            {!! Form::close() !!}
            <table class="table-responsive patients-table">
                <tr><th>Ime i prezime pacijenta</th>
                    <th>Email adresa</th>
                    <th>Broj telefona</th>
                    <th>Istorija pacijenta</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td><a class="btn btn-info" href="dashboard/{{$user->id}}">Istorija pacijenta</a></td>
                </tr>
                @endforeach
            </table>
            @else 
            <h1>Trenutno nemate nijednog pacijenta</h1>
            {!! Form::open(['action' => 'App\Http\Controllers\HomeController@showAllPatients', 'method' => 'GET', 'enctype' => 'multipart/form-data',  'class' => 'search-form']) !!}    
        {!!Form::submit("Search",['class' => '', 'id' => 'search-input-patients', 'id' => 'search-input-patients'])!!}
        {!! Form::text('searchInput','', ["placeholder" => "Pretrazi", 'class' => 'float-right'])!!}
            {!! Form::close() !!}
            @endif
            <div class="pagination justify-content-center" style="margin-top:30px; font-size:22px;">{{ $users->links() }}</div>
    </div>
@endsection