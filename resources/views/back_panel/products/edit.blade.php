@extends("back_panel.layout")

@section("header", "Update product")

@section("content")
    @php
        /* @var \App\Product[] $product */
    @endphp

    <div class="row">
        <div class="col-8">
            {!! Form::open(['url' => route('back_panel.products.update',[$product])]) !!}
                @method("PUT")
                <div class="form-group row">
                    {!! Form::label("product[type]", "Product type", ["class" =>"col-sm-2 col-form-label"]) !!}
                    <div class="col-sm-4">
                        {!! Form::text("product[type]", $product->type, ["class"=>"form-control ".($errors->has("product.type") ? "is-invalid" : "")]) !!}
                        @error("product.type")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label("product[brand]", "Product brand", ["class" =>"col-sm-2 col-form-label"]) !!}
                    <div class="col-sm-4">
                        {!! Form::text("product[brand]", $product->brand, ["class"=>"form-control ".($errors->has("product.brand") ? "is-invalid" : "")]) !!}
                        @error("product.brand")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            <div class="form-group row">
                {!! Form::label("product[quantity]", "Quantity", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-4">
                    {!! Form::number("product[quantity]", $product->quantity, ["class"=>"form-control ".($errors->has("product.quantity") ? "is-invalid" : ""), "min"=>0]) !!}
                    @error("product.quantity")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
                <div class="form-group row">
                    {!! Form::label("product[price]", "Price", ["class" =>"col-sm-2 col-form-label"]) !!}
                    <div class="col-sm-4">
                        {!! Form::number("product[price]", $product->price, ["class"=>"form-control ".($errors->has("product.price") ? "is-invalid" : ""), "min"=>0]) !!}
                        @error("product.price")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-danger btn-sm">Update</button>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
