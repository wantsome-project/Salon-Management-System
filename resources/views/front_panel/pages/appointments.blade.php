@extends("front_panel.layout")
@section("header", "Make an Appointment")
@section("content")

    {!! Form::open(['url' => route('appointment.store'), 'method'=>'post']) !!}
    @csrf
    <div class="form-group row">
        {!! Form::label("employee_id", "Select Employee", ["class" =>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-10">
            {!! Form::select('employee_id',$employees, ["class"=>"form-control"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label("service_type_id", "Service Type", ["class" =>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-10">
            {!! Form::select('service_type_id',$service_types, ["class"=>"form-control"]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label("appointment_date", "Pick a date", ["class" =>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-10">
                <input type='text' name="appointment_date" class="form-control" id="datepicker" />
            </div>
        </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Sumbit</button>
        </div>
    </div>
    {!! Form::close() !!}


@endsection
@section('footer-scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
@endsection
