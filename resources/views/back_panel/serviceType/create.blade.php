@extends("back_panel.layout")

@section("header", "Fill in the information of the new service type")

@section("content")
    <div class="row">
        <div class="col-8">
            {!! Form::open(['url' => route('back_panel.service_types.store')]) !!}
            <div class="form-group row">
                {!! Form::label("service_type[name]", "Name", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::text("service_type[name]", null, ["class"=>"form-control ".($errors->has("service_type.name") ? "is-invalid" : "")]) !!}
                    @error("service_type.name")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("service_type[description]", "Description", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::text("service_type[description]", null, ["class"=>"form-control ".($errors->has('service_type.description') ? "is-invalid" : "")]) !!}
                    @error("service_type.email")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("service_type[duration]", "Duration", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::number("service_type[duration]", null, ["class"=>"form-control ".($errors->has('service_type.duration') ? "is-invalid" : "")]) !!}
                    @error("service_type.duration")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("service_type[price]", "Price", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::number("service_type[price]", null, ["class"=>"form-control ".($errors->has("service_type.price") ? "is-invalid" : ""), "min"=>0]) !!}
                    @error("service_type.price")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
