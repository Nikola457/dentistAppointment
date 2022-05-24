@include('layouts/app')

<div class="contact-form">
        <div class="container">
            <div class="content">
                <a href="{{ URL::previous() }}" class="btn btn-dark">Go Back</a><br><br>
            <h1 class="text-uppercase">{{$schedule->subject}}</h1>
            <small>Datum zakazivanja: {{$schedule->created_at}}</small>
            <div class="card">
                <div class="card-body">
                <div class="container-show">
                @if($schedule->cover_image != "")
                <img class="rounded float-left" id="show-img" src="/storage/cover_images/{{$schedule->cover_image}}" >
                @endif
                <div class="show-schedule-text"><p>{{$schedule->message}}<p>

                    <small>Zakazan termin: <b> {{$schedule->scheduleDate}} - {{$schedule->scheduleDateEnd}}</b></small>
                </div>
            </div>
                @if(Auth::user()->name === 'admin')
                {!! Form::open(['action' => ['App\Http\Controllers\ScheduleController@destroy', $schedule->id], 'method' => 'POST', 'enctype' => 'multipart/form-data',  'class' => 'submit-form']) !!}    
                {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Obrisi',["class" => "col-md-2 float-right btn btn-danger", "id" => "submit"])}}
                        {!! Form::close() !!}
                @endif

                    </div>
                </div>
            </div>
        </div>
             </div>
                    <script>
                </script>