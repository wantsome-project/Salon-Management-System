@extends("back_panel.layout")

@section("header", "Fill in the information of the new employer")

@section("content")
    <div class="row">
        <div class="col-8">
            {!! Form::open(['url' => route('back_panel.employees.store')]) !!}
            <div class="form-group row">
                {!! Form::label("user[name]", "Name", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::text("user[name]", null, ["class"=>"form-control ".($errors->has("user.name") ? "is-invalid" : "")]) !!}
                    @error("user.name")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("user[email]", "Email", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::email("user[email]", null, ["class"=>"form-control ".($errors->has('user.email') ? "is-invalid" : "")]) !!}
                    @error("user.email")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("user[password]", "Password", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::password("user[password]", ["class"=>"form-control ".($errors->has('user.password') ? "is-invalid" : "")]) !!}
                    @error("user.password")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("user[password_confirmation]", "Confirm password", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::password("user[password_confirmation]", ["class"=>"form-control ".($errors->has('user.password_confirmation') ? "is-invalid" : "")]) !!}
                    @error("user.password_confirmation")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("employee[phone]", "Phone", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::text("employee[phone]", null, ["class"=>"form-control ".($errors->has("employee.phone") ? "is-invalid" : "")]) !!}
                    @error("employee.phone")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                    {!! Form::label("employee[payroll]", "Payroll", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::number("employee[payroll]", null, ["class"=>"form-control ".($errors->has("employee.payroll") ? "is-invalid" : ""), "min"=>0]) !!}
                    @error("employee.payroll")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
