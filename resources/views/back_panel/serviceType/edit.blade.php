@extends("back_panel.layout")

@section("header", "Update Service Types")

@section("content")
    @php
        /* @var \App\ServiceType $service_type */
    @endphp

    <div class="row">
        <div class="col-8">
            {!! Form::open(['url' => route('back_panel.service_types.update',[$service_type]), "files" => true]) !!}
            @method("PUT")
            <div class="form-group row">
                {!! Form::label("service_type[name]", "Name", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::text("service_type[name]", $service_type->name, ["class"=>"form-control ".($errors->has("service_type.name") ? "is-invalid" : "")]) !!}
                    @error("service_type.name")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("service_type[description]", "Description", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::text("service_type[description]", $service_type->description, ["class"=>"form-control ".($errors->has("service_type.description") ? "is-invalid" : "")]) !!}
                    @error("service_type.description")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("service_type[duration]", "Duration", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::number("service_type[duration]", $service_type->duration, ["class"=>"form-control ".($errors->has("service_type.duration") ? "is-invalid" : ""), "min"=>0]) !!}
                    @error("service_type.duration")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("service_type[price]", "Price", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::number("service_type[price]", $service_type->price, ["class"=>"form-control ".($errors->has("service_type.price") ? "is-invalid" : ""), "min"=>0]) !!}
                    @error("service_type.price")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("service_type[image]", "Choose file", ["class" =>"col-sm-2 col-form-label","custom-file-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::file("service_type[image]", null, ["class"=>"form-control ".($errors->has("service_type.image") ? "is-invalid" : "")]) !!}
                    @error("service_type.image")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-danger btn-sm">Update</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
