@extends("back_panel.layout")

@section("header", "Update employee")

@section("content")
    @php
        /* @var \App\Employee[] $employee */
    @endphp

    <div class="row">
        <div class="col-8">
            {!! Form::open(['url' => route('back_panel.employees.update',[$employee]), 'files' => true]) !!}
            @method("PUT")
            <div class="form-group row">
                {!! Form::label("user[name]", "Name", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::text("user[name]", $employee->user->name, ["class"=>"form-control ".($errors->has("user.name") ? "is-invalid" : "")]) !!}
                    @error("user.name")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("employee[service_type_id]", "Service provided", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::select("employee[service_type_id]",$service_type_names, $employee->service_type_id, ["class"=>"form-control ".($errors->has("employee.service_type_id") ? "is-invalid" : "")]) !!}
                    @error("employee.service_type_id")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("employee[phone]", "Phone", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::text("employee[phone]", $employee->phone, ["class"=>"form-control ".($errors->has("employee.phone") ? "is-invalid" : "")]) !!}
                    @error("employee.phone")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("employee[payroll]", "Payroll", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::number("employee[payroll]", $employee->payroll, ["class"=>"form-control ".($errors->has("employee.payroll") ? "is-invalid" : ""), "min"=>0]) !!}
                    @error("employee.payroll")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("employee[image]", "Choose file", ["class" =>"col-sm-2 col-form-label","custom-file-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::file("employee[image]", null, ["class"=>"form-control ".($errors->has("employee.image") ? "is-invalid" : "")]) !!}
                    @error("employee.image")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-danger btn-sm">Update</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
