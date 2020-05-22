@extends("front_panel.layout")
@section("header", "Contact us")
@section("content")
    <div class="row">
        <div class="col-6">
            {!! Form::open(['url' => route('customer_requests.store')]) !!}
            @csrf
            <div class="form-group row">
                {!! Form::label("customer_request[name]", "Name", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-10">
                    {!! Form::text("customer_request[name]", $value = null, ["class"=>"form-control ".($errors->has("customer_request.name") ? "is-invalid" : "")]) !!}
                    @error("customer_request.name")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">

                {!! Form::label("customer_request[email]", "Email", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-10">
                    {!! Form::email("customer_request[email]", $value = null, ["class"=>"form-control ".($errors->has("customer_request.email") ? "is-invalid" : "")]) !!}
                    @error("customer_request.email")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("customer_request[phone]", "Phone", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-10">
                    {!! Form::text("customer_request[phone]", null, ["class"=>"form-control ".($errors->has("customer_request.phone") ? "is-invalid" : "")]) !!}
                    @error("customer_request.phone")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("customer_request[subject]", "Subject", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-10">
                    {!! Form::text("customer_request[subject]", $value = null, ["class"=>"form-control ".($errors->has("customer_request.subject") ? "is-invalid" : "")]) !!}
                    @error("customer_request.subject")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label("customer_request[message]", "Message", ["class" =>"col-sm-2 col-form-label"]) !!}
                <div class="col-sm-10">
                    {!! Form::textarea("customer_request[message]", $value = null, ["class"=>"form-control ".($errors->has("customer_request.message") ? "is-invalid" : "")]) !!}
                    @error("customer_request.message")
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <h5><small>By using this contact form you agree to the <a class="text-muted" href="{{ route("terms") }}">terms and conditions</a> </small></h5>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
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
                    <td>Sunday: inchis</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
