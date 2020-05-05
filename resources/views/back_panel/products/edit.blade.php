@extends("back_panel.layout")

@section("header", "Products list")

@section("content")
    @php
        /* @var \App\Product $product */
    @endphp

    <div class="row">
        <div class="col-8">
            {!! Form::open(['url' => route('products.update',[$product])]) !!}
                @method("PUT")
                <div class="form-group row">
                    {!! Form::label("product_type", "Product type", ["class" =>"col-sm-2 col-form-label"]) !!}
                    <div class="col-sm-4">
                        {!! Form::text("product_type", $product->product_type, ["class"=>"form-control ".($errors->has("product_type") ? "is-invalid" : "")]) !!}
                        @error("product_type")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label("product_brand", "Product brand", ["class" =>"col-sm-2 col-form-label"]) !!}
                    <div class="col-sm-4">
                        {!! Form::text("product_brand", $product->product_brand, ["class"=>"form-control ".($errors->has("product_brand") ? "is-invalid" : "")]) !!}
                        @error("product_brand")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label("price", "Price", ["class" =>"col-sm-2 col-form-label"]) !!}
                    <div class="col-sm-4">
                        {!! Form::number("price", $product->price, ["class"=>"form-control ".($errors->has("price") ? "is-invalid" : ""), "min"=>0]) !!}
                        @error("price")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-danger btn-sm">Update</button>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
