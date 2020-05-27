@extends("front_panel.layout")
@section("header", "Make an Appointment")
@section("custom_css")
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section("content")

    {!! Form::open(['url' => route('appointment.store'), 'autocomplete'=>'off']) !!}
    @csrf
    <div class="form-group row">
        {!! Form::label("employee_id", "Select Employee", ["class" =>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-10">
            {!! Form::select('employee_id',$employees, ["class"=>"form-control".($errors->has("employee_id") ? "is-invalid" : "")]) !!}
            @error("employee_id")
        {!! Form::label("appointment[employee_id]", "Employee", ["class" =>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-4">
            {!! Form::select("appointment[employee_id]",$employees, null, ["class"=>"form-control ".($errors->has("appointment.employee_id") ? "is-invalid" : "")]) !!}
            @error("appointment.employee_id")
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>git 
    <div class="form-group row">
        {!! Form::label("service_type_id", "Service Type", ["class" =>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-10">
            {!! Form::select('service_type_id',$service_types, ["class"=>"form-control".($errors->has("service_type_id") ? "is-invalid" : "")]) !!}
            @error("service_type_id")
        {!! Form::label("appointment[service_type_id]", "Service type", ["class" =>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-4">
            {!! Form::select("appointment[service_type_id]",$service_types, null, ["class"=>"form-control ".($errors->has("appointment.service_type_id") ? "is-invalid" : "")]) !!}
            @error("appointment.service_type_id")
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label("appointment[appointment_date]", "Pick a date", ["class" =>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-4">
            {!! Form::text("appointment[appointment_date]"," ", ['id' => 'datepicker', "class"=>"form-control ".($errors->has("appointment.appointment_date") ? "is-invalid" : "")]) !!}
            @error("appointment.appointment_date")
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
{{--            <input type='text' name="appointment_date" class="form-control" id="datepicker"/>--}}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label("appointment_time", "Pick a time", ["class" =>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-10">
            {!! Form::select('appointment_time',$time_ranges, ["class"=>"form-control".($errors->has("appointment_time") ? "is-invalid" : "")]) !!}
            @error("appointment_time")
        {!! Form::label("appointment[appointment_time]", "Pick a time", ["class" =>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-4">
            {!! Form::select("appointment[appointment_time]",$time_ranges, null, ["class"=>"form-control ".($errors->has("appointment.appointment_time") ? "is-invalid" : "")]) !!}
            @error("appointment.appointment_time")
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
@section('footer-scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker").datepicker();
        });
    </script>
@endsection
