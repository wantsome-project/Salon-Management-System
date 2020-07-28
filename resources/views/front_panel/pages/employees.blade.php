
    {!! Form::label("appointment[employee_id]", "Employees", ["class" =>"col-sm-2 col-form-label"]) !!}
    <div class="col-sm-4">
        {!! Form::select("appointment[employee_id]",$employees, null, ["class"=>"form-control ".($errors->has("appointment.employee_id") ? "is-invalid" : "")]) !!}
        @error("appointment.employee_id")
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
