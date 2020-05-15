@extends("back_panel.layout")

@section("header", "Create new salary payment")

@section("content")
    @php
        /* @var \App\SalaryPayment[] $salary_payment */
    @endphp


    <div class="row">
        <div class="col-8">
            {!! Form::open(['url' => route('back_panel.salary_payments.store')]) !!}
            <div class="form-group row">
                {!! Form::label("salary_payment[employee_id]", "Employee Name", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::select("salary_payment[employee_id]",$employees_arr, null, ["class"=>"form-control ".($errors->has("salary_payment.employee_id") ? "is-invalid" : "")]) !!}
                    @error("salary_payment.employee_id")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("salary_payment[paid]", "Paid amount", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::number("salary_payment[paid]", null, ["class"=>"form-control ".($errors->has("salary_payment.paid") ? "is-invalid" : ""), "min"=>0]) !!}
                    @error("salary_payment.paid")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("salary_payment[description]", "Description", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::text("salary_payment[description]", null, ["class"=>"form-control ".($errors->has("salary_payment.description") ? "is-invalid" : "")]) !!}
                    @error("salary_payment.description")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

