@extends("front_panel.layout")
@section("header")
    <h3 class="mx-auto text-center"><strong>Beauty Salon</strong></h3>
    <h4 class="text-center">BARBER SHOP - HAIRSTYLE - COSMETICS - MAKE-UP</h4>
@endsection

@section("content")
    <hr>
    <h4 class="text-success">Services</h4>
    <hr>
    @include('front_panel.pages.service_type.cards')
    <hr>
    <h4 class="text-success">Products</h4>
    <hr>
    @include('front_panel.pages.products.cards')
    <hr>
    <h4 class="text-success">Our team</h4>
    <hr>
    @include('front_panel.pages.staff.cards')

@endsection
