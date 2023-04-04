@extends("front_panel.layout")
@section("header", "")
@section("content")
    <h3>Contact us</h3>
    <div class="row">
        <div class="col-6">
            <table>
                <tr>
                    <th>Address:</th>
                    <td>Bd. Unirii, nr. 6, bl. A4, scara B ,interfon 22, Iasi</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><a href="mailto:sirbuanca2@gmail.com">sirbuanca2@gmail.com</a></td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td><a href="tel:0725630610">0725 630 610</a></td>
                </tr>
                <tr>
                    <th>Program:</th>
                    <td>Monday-friday: 09:00 – 21:00</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Saturday: 09:00 – 17:00</td>
                </tr>
                <tr>
                    <th></th>
                    <td>Sunday: close</td>
                </tr>
            </table>
        </div>
        <div class="col-6">
            {!! Form::open(['url' => route('customer_requests.store')]) !!}
            @csrf
            <div class="form-group row">
                {!! Form::label("name", "Name", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-10">
                    {!! Form::text("name", $value = null, ["class"=>"form-control ".($errors->has("name") ? "is-invalid" : "")]) !!}
                    @error("name")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">

                {!! Form::label("email", "Email", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-10">
                    {!! Form::email("email", $value = null, ["class"=>"form-control ".($errors->has("email") ? "is-invalid" : "")]) !!}
                    @error("email")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("phone", "Phone", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-10">
                    {!! Form::text("phone", null, ["class"=>"form-control ".($errors->has("phone") ? "is-invalid" : "")]) !!}
                    @error("phone")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("subject", "Subject", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-10">
                    {!! Form::text("subject", $value = null, ["class"=>"form-control ".($errors->has("subject") ? "is-invalid" : "")]) !!}
                    @error("subject")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("message", "Message", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-10">
                    {!! Form::textarea("message", $value = null, ["class"=>"form-control ".($errors->has("message") ? "is-invalid" : "")]) !!}
                    @error("message")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <h6><small>By using this contact form you agree to the <a class="text-muted" href="{{ route("terms") }}">terms and conditions</a> </small></h6>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
