@extends("front_panel.layout")
@section("header", "Contact us")
@section("content")

    {!! Form::open(['url' => 'front_panel/contact']) !!}
    @csrf
    <div class="wpb_wrapper">
        <p><strong>Adresa:</strong> Bd. Unirii, nr. 6, bl. A4, scara B ,interfon 22, Iasi</p>
        <p><strong>Email:</strong>&nbsp;<a href="mailto:sirbuanca2@gmail.com">sirbuanca2@gmail.com</a></p>
        <p><strong>Telefon:</strong> <a href="tel:0725630610">0725 630 610</a></p>
        <p><strong>Program:&nbsp;</strong>Luni-Vineri: 09:00 – 21:00; Sambata: 09:00 – 17:00; Duminca: Inchis</p>
    </div>
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
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Sumbit</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
