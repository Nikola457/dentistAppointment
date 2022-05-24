 @if ($errors->any())
<div class="alert alert-danger" style="margin:0px; padding-top:20px !important;">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if(session('error'))
<div class="alert alert-danger" style="padding-top:20px !important; margin:0px">
    {{session('error')}}
</div>
@endif