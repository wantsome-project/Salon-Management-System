@extends("front_panel.layout")
@section("content")
<h3>Contact us</h3>

{!! Form::open(['url' => 'front_panel/contact']) !!}
@csrf
<div class="form-group row">
    {!! Form::label("my_email", "Email", ["class" =>"col-sm-2 col-form-label"]) !!}
    <div class="col-sm-10">
        {!! Form::email("my_email", $value = null, ["class"=>"form-control"]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label("name", "Name", ["class" =>"col-sm-2 col-form-label"]) !!}
    <div class="col-sm-10">
        {!! Form::text("name", $value = null, ["class"=>"form-control".($errors->has("name") ? "is-invalid" : "")]) !!}
        @error("name")
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    {!! Form::label("description", "Description", ["class" =>"col-sm-2 col-form-label"]) !!}
    <div class="col-sm-10">
        {!! Form::textarea("description", $value = null, ["class"=>"form-control"]) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">Checkbox</div>
    <div class="col-sm-10">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Sumbit</button>
    </div>
</div>
{!! Form::close() !!}
@endsection
