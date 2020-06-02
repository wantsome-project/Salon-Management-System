@extends("back_panel.layout")

@section("header", "Fill in the information of the new service")
        @php
            $user =  Auth::user();
        @endphp

@section("content")
    <div class="row">
        <div class="col-8">
            {!! Form::open(['url' => route('back_panel.services.store')]) !!}
            @if($user->is_admin)
            <div class="form-group row">
                {!! Form::label("service[employee_id]", "Employee", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::select("service[employee_id]",$employees_services, null, ["class"=>"form-control ".($errors->has("service.employee_id") ? "is-invalid" : "")]) !!}
                    @error("service.employee_id")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            @endif
            <div class="form-group row">
                {!! Form::label("service[customer_id]", "Customer", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::select("service[customer_id]",$customers_services, null, ["class"=>"form-control ".($errors->has("service.customer_id") ? "is-invalid" : "")]) !!}
                    @error("service.customer_id")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("service[service_type_id]", "Service type", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::select("service[service_type_id]",$service_type_names, null, ["class"=>"form-control ".($errors->has("service.service_type_id") ? "is-invalid" : "")]) !!}
                    @error("service.service_type_id")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
