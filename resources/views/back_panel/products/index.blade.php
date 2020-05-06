@extends("back_panel.layout")

@section("header")
    List of products
    <a href="{{ route("products.create") }}" class="btn btn-primary float-right">Add new product</a>
@endsection

@section("content")
    @php
        /* @var \App\Product[] $products */
    @endphp

    <div class="row">
        <div class="col-8">
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Product type</th>
                    <th>Product brand</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <th>{{ $product->id }}</th>
                        <td>{{ $product->type }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td><a href="{{ route('products.edit', $product) }}"><i class="fas fa-edit"></i></a></td>
                        <td>
                            {!! Form::open(['url' => route('products.destroy',[$product])]) !!}
                                @csrf
                                @method("delete")
                                <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    {{ $products->links() }}
@endsection
