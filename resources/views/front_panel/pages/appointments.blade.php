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
            {!! Form::select("appointment[employee_id]",$employees, null, ["onchange"=>"getAvailableTimeRanges()", "class"=>"form-control ".($errors->has("appointment.employee_id") ? "is-invalid" : "")]) !!}
            @error("appointment.employee_id")
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label("appointment[appointment_date]", "Pick a date", ["class" =>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-4">
            {!! Form::text("appointment[appointment_date]"," ", ['id' => 'datepicker', "onchange"=>"getAvailableTimeRanges()", "class"=>"form-control ".($errors->has("appointment.appointment_date") ? "is-invalid" : "")]) !!}
            @error("appointment.appointment_date")
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label("appointment[appointment_time]", "Pick a time", ["class" =>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-4">
            {!! Form::select("appointment[appointment_time]",$time_ranges, null, ['id' =>"appointment_time", "class"=>"form-control ".($errors->has("appointment.appointment_time") ? "is-invalid" : "")]) !!}
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
            var request = $.ajax({
                url: "{{ route('service_type.employees') }}",
                type: "GET",
                dataType: "JSON",
                data: {
                    "service_type_id": service_type_select.value,
                },
            });

            request.done(function (employees) {
                let service_type_employees = "";
                for (let employee of employees) {
                    service_type_employees += "<option value='"+ employee.id +"'>"+employee.user.name+"</option>";
                }
                $("#appointment\\[employee_id\\]").html(service_type_employees);
            })

            request.fail(function (jqXHR, testStatus) {
                alert("Request failed: " + testStatus ) ;
            });
        }
    </script>
    <script>
        let time_ranges = {
            '09:00:00': '09:00-09:30',
            '09:30:00': '09:30-10:00',
            '10:00:00': '10:00-10:30',
            '10:30:00': '10:30-11:00',
            '11:00:00': '11:00-11:30',
            '11:30:00': '11:30-12:00',
            '12:00:00': '12:30-13:00',
            '12:30:00': '13:30-14:00',
            '13:00:00': '14:00-14:30',
            '13:30:00': '14:30-15:00',
            '14:00:00': '15:00-15:30',
            '14:30:00': '15:30-16:00',
            '15:00:00': '16:00-16:30',
            '15:30:00': '16:30-17:00',
        };
        function getAvailableTimeRanges() {
        // Get the selected employee ID and appointment date
            const employeeId = document.querySelector('select[name="appointment[employee_id]"]').value;
            const appointmentDate = document.getElementById('datepicker').value;

        // Make a request to retrieve the employee's available time ranges
            const request = $.ajax({
                url: "{{ route('employee.available_time_ranges') }}",
                type: "GET",
                dataType: "JSON",
                data: {
                    "employee_id": employeeId,
                    "appointment_date": appointmentDate
                },
            });

                request.done(function (timeRanges) {
                // Update the appointment time select element with the available time ranges
                    let service_type_ranges = "";
                    let excludedValues = [];
                    timeRanges.map(appointment => {
                        excludedValues.push(appointment.appointment_time)
                    })

                    let filteredTimeRanges = Object.keys(time_ranges)
                        .filter(key => !excludedValues.includes(key))
                        .reduce((obj, key) => {
                            obj[key] = time_ranges[key];
                            return obj;
                        }, {});

                    let time_ranges_array = Object.entries(filteredTimeRanges)
                        .map(([key, value]) => ({ time: key, range: value }));

                    for (let time of time_ranges_array) {
                        service_type_ranges += "<option value='"+ time.time +"'>"+time.range+"</option>";
                    }

                    $("#appointment_time").html(service_type_ranges);
                });
        }
    </script>

@endsection
