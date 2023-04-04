@php
    /* @var \App\Product[]  $products*/
@endphp
<div class="card-deck">
    <products-component></products-component>
{{--    @foreach($products as $product)--}}
{{--        <div class="card">--}}
{{--            @if($product->photo_name)--}}
{{--            <img src="{{ $product->getPhotoUrl() }}" class="card-img-top" alt="...">--}}
{{--            @endif--}}
{{--            <div class="card-body">--}}
{{--                <h5 class="card-title">{{ $product->type }}</h5>--}}
{{--                <h6 class="card-text">{{$product->brand}} </h6>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endforeach--}}
    <script src="{{mix('js/app.js')}}" ></script>
</div>
