@extends("front_panel.layout")
@section("header")
    <h3 class="mx-auto text-center">Beauty Salon</h3>
    <p class="text-secondary text-center">BARBER SHOP - HAIRSTYLE - COSMETICS - MAKE-UP</p>

@endsection

@section("content")
    <h4 class="p-3 mb-2 bg-success text-white">Our services</h4>
    <hr>
    @include('front_panel.pages.service_type.cards')
    <h4 class="p-3 mb-2 bg-success text-white">Our products</h4>
    <hr>
    @include('front_panel.pages.products.cards')
    <h4 class="p-3 mb-2 bg-primary text-white">Our team</h4>
    <hr>
    @include('front_panel.pages.staff.cards')

@endsection
