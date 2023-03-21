@extends("front_panel.layout")
@section("header", "Make an Appointment")
@section("custom_css")
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section("content")

    {!! Form::open(['url' => route('appointment.store'), 'autocomplete'=>'off']) !!}
    @csrf
    <div class="form-group row">
        {!! Form::label("appointment[service_type_id]", "Service type", ["class" =>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-4">
            {!! Form::select("appointment[service_type_id]",$service_types, null,["onchange"=>"get_title(this)", "class"=>"form-control ".($errors->has("appointment.service_type_id") ? "is-invalid" : "")]) !!}
            @error("appointment.service_type_id")
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row" id="txtHint">
        {!! Form::label("appointment[employee_id]", "Employee", ["class" =>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-4">
            {!! Form::select("appointment[employee_id]",$employees, null, ["class"=>"form-control ".($errors->has("appointment.employee_id") ? "is-invalid" : "")]) !!}
            @error("appointment.employee_id")
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
        </div>
    </div>
    <div class="form-group row">
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
        $(function() {
            $( "#datepicker" )
                .datepicker(
                    {
                        minDate: 0,
                        maxDate: "+2M",
                        dateFormat: 'yy-mm-dd',
                        changeMonth: true,
                        changeYear: true,
                        beforeShowDay: function(date) {
                            var day = date.getDay();
                            return [(day != 0), ''];
                        }
                    }
                );
        });
    </script>
    <script>
        function get_title(service_type_select) {
            let request = $.ajax({
                url: "{{ route('service_type.employees') }}",
                type: "GET",
                dataType: "JSON",
                data: {
                    "service_type_id": service_type_select.value,
                },
            });

            request.done(function (employees) {
                let service_type_employees = "";
                for (var employee of employees) {
                    service_type_employees += "<option value='"+ employee.id +"'>"+employee.user.name+"</option>";
                }
                $("#appointment\\[employee_id\\]").html(service_type_employees);
            })

            request.fail(function (jqXHR, testStatus) {
                alert("Request failed: " + testStatus ) ;
            });
        }
    </script>
{{-- varianta html--}}
{{--    <script>--}}
{{--        function get_title(service_type_select) {--}}
{{--            var request = $.ajax({--}}
{{--                url: "{{ route('service_type.employees') }}",--}}
{{--                type: "GET",--}}
{{--                data: {--}}
{{--                    "service_type_id": service_type_select.value,--}}
{{--                },--}}
{{--            });--}}

{{--            request.done(function (employees) {--}}
{{--                $("#txtHint").html(employees);--}}
{{--            })--}}

{{--            request.fail(function (jqXHR, testStatus) {--}}
{{--                // console.log(jqXHR, testStatus);--}}
{{--                alert("Request failed: " + testStatus ) ;--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}
@endsection
