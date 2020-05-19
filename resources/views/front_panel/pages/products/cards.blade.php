@php
    /* @var \App\Product[]  $products*/
@endphp
<div class="card-deck">
    @foreach($products as $product)
        <div class="card">
            <img src="{{ asset ("assets/products_images/".$product->id.".jpg")}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $product->type }}</h5>
                <h6 class="card-text">{{$product->brand}} </h6>
            </div>
        </div>
    @endforeach
</div>
