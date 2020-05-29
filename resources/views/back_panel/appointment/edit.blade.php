@extends("back_panel.layout")
@section("header", "Fill in the information of the new appointment")
@section("custom_css")
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@php
    $user =  Auth::user();
@endphp

@section("content")
    @php
        /* @var \App\Appointment[] $appointment */
    @endphp
    <div class="row">
        <div class="col-8">
            {!! Form::open(['url' => route('back_panel.appointment.update',[$appointment])]) !!}
            @method('PUT')
            @if($user->is_admin)
                <div class="form-group row">
                    {!! Form::label("appointment[employee_id]", "Employee", ["class" =>"col-sm-2 col-form-label"]) !!}
                    <div class="col-sm-4">
                        {!! Form::select("appointment[employee_id]", $employees_appointment, $appointment->employee_id, ["class"=>"form-control ".($errors->has("appointment.employee_id") ? "is-invalid" : "")]) !!}
                        @error("appointment.employee_id")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endif
            <div class="form-group row">
                {!! Form::label("appointment[customer_id]", "Customer ", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::select("appointment[customer_id]", $customers_appointment, $appointment->customer_id, ["class"=>"form-control ".($errors->has("appointment.customer_id") ? "is-invalid" : "")]) !!}
                    @error("appointment.customer_id")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("appointment[service_type_id]", "Service type", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::select("appointment[service_type_id]",$service_type_names, $appointment->service_type_id, ["class"=>"form-control ".($errors->has("appointment.service_type_id") ? "is-invalid" : "")]) !!}
                    @error("appointment.service_type_id")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        <div class="form-group row">
            {!! Form::label("appointment[status]", "Status", ["class" =>"col-sm-2 col-form-label"]) !!}
            <div class="col-sm-4">
                {!! Form::select("appointment[status]",$status_appointment, $appointment->status, ["class"=>"form-control ".($errors->has("appointment.status") ? "is-invalid" : "")]) !!}
                @error("appointment.status")
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label("appointment[appointment_date]", "Pick a date", ["class" =>"col-sm-2 col-form-label"]) !!}
            <div class="col-sm-4">
                {!! Form::text("appointment[appointment_date]",$appointment->appointment_date, ['id' => 'datepicker', "class"=>"form-control ".($errors->has("appointment.appointment_date") ? "is-invalid" : "")]) !!}
                @error("appointment.appointment_date")
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label("appointment[appointment_time]", "Pick a time", ["class" =>"col-sm-2 col-form-label"]) !!}
            <div class="col-sm-4">
                {!! Form::select("appointment[appointment_time]",$time_appointment, $appointment->appointment_time, ["class"=>"form-control ".($errors->has("appointment.appointment_time") ? "is-invalid" : "")]) !!}
                @error("appointment.appointment_time")
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
            <button type="submit" class="btn btn-danger btn-sm">Update</button>
            {!! Form::close() !!}
    </div>
@endsection
@section('footer-scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
@endsection
@yield("custom_css")

