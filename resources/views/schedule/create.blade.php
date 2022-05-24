@include('layout.scripts')

@include('layouts.app')
<div class="container">
    <a href="{{ URL::previous() }}" class="btn btn-dark">Go Back</a><br><br>
    <h5 class="alert alert-warning" role="alert">Ukoliko imate hitan slucaj - pozovite nas! 555-555-555</h5>
    <h1>Zakazite termin</h1>
<div class="contact-form">
    @include('layout.error')
     {!! Form::open(['action' => 'App\Http\Controllers\ScheduleController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data',  'class' => 'submit-form']) !!}    
                
                    <div class="row">
                            <div class="col-md-6">
                                <div class="single-form form-group">
                                    {!! Form::text('subject','', ["placeholder" => "Naslov"])!!}
                                </div>
                            </div>              
                              
                                <div class="col-md-3">
                                    <div class="single-form form-group">
                                       <input type="datetime-local"    name="dateStart" id="date-create"> 
                                       
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="single-form form-group">
                                       <input type="datetime-local"   name="dateEnd" class="date-create">
                                       
                                    </div>
                                </div>
                             
                                <div class="col-md-12">
                                    <div class="single-form form-group">
                                        {!! Form::textarea('message','',['placeholder' => 'Poruka'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6 float-right">{!! Form::file('cover_image') !!}</div>
                                <div class="col-md-6">
                                    {{Form::submit('Submit',["class" => "col-md-12 btn btn-danger", "id" => "submit"])}}
                                {!! Form::close() !!}
                            </div> <!-- row -->
            
                    </div> <!-- row -->
                </div>
                
            </div>
            <script>
                config ={
                    enableTime: true,
                    dateFormat: "d.m.Y H:i",
                    altInput: true,
                    time_24hr: true,
                    minDate:"today",
                    maxDate: new Date().fp_incr(120),
                    minTime: "08:00",
                    maxTime: "16:30",
                }
                flatpickr('input[type=datetime-local]', config);
            </script>