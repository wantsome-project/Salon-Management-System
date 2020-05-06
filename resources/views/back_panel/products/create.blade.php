@extends("back_panel.layout")

@section("header", "")

@section("content")
    <div class="row">
        <div class="col-8">
             {!! Form::open(['url' => route('products.store')]) !!}
                <div class="form-group row">
                    {!! Form::label("type", "Product type", ["class" =>"col-sm-2 col-form-label"]) !!}
                    <div class="col-sm-4">
                        {!! Form::text("type", $value = null, ["class"=>"form-control ".($errors->has("type") ? "is-invalid" : "")]) !!}
                        @error("type")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label("brand", "Product brand", ["class" =>"col-sm-2 col-form-label"]) !!}
                    <div class="col-sm-4">
                        {!! Form::text("brand", $value = null, ["class"=>"form-control ".($errors->has("brand") ? "is-invalid" : "")]) !!}
                        @error("brand")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label("quantity", "Quantity", ["class" =>"col-sm-2 col-form-label"]) !!}
                    <div class="col-sm-4">
                        {!! Form::number("quantity", $value = null, ["class"=>"form-control ".($errors->has("quantity") ? "is-invalid" : ""), "min"=>0]) !!}
                        @error("quantity")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label("price", "Price", ["class" =>"col-sm-2 col-form-label"]) !!}
                    <div class="col-sm-4">
                        {!! Form::number("price", $value = null, ["class"=>"form-control ".($errors->has("price") ? "is-invalid" : ""), "min"=>0]) !!}
                        @error("price")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
