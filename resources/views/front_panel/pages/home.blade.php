@extends("front_panel.layout")
@section("header")
    Welcome
@endsection

@section("content")
    <h4>Our team</h4>
    <hr>
    @include('front_panel.pages.staff.cards')
    <h4>Our services</h4>
    <hr>
    @include('front_panel.pages.service_type.cards')
    <h4>Our products</h4>
    <hr>
    @include('front_panel.pages.products.cards')
@endsection
