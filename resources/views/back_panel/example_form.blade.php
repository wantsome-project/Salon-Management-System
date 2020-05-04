
@extends("back_panel.layout")

@section("content")
    <h3>Forms examples</h3>

    {!! Form::open(['url' => 'back_panel/product']) !!}
        @csrf
        <div class="form-group row">
            {!! Form::label("my_email", "Email", ["class" =>"col-sm-2 col-form-label"]) !!}
            <div class="col-sm-10">
                {!! Form::email("my_email", $value = null, ["class"=>"form-control"]) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label("my_password", "Password", ["class" =>"col-sm-2 col-form-label"]) !!}
            <div class="col-sm-10">
                {!! Form::password("my_password", ["class"=>"form-control"])!!}
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
{{--    Select multiple--}}
        <div class="form-group row">
            {!! Form::label("service_type", "Service types", ["class" =>"col-sm-2 col-form-label"]) !!}
            <div class="col-sm-10">
                {!! Form::select("service_type", ['hair-cur', 'nail', 'make-up'], null, ["multiple class"=>"form-control"]) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label("color", "Hair Color", ["class" =>"col-sm-2 col-form-label"]) !!}
            <div class="col-sm-10">
                {!! Form::select("color", ['blonde', 'red',' black', 'brown', 'hash brown', 'gray'], null, ["class"=>"form-control"]) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label("number", "Number of products", ["class" =>"col-sm-2 col-form-label"]) !!}
            <div class="col-sm-10">
                {!! Form::number("number", null, ["class"=>"form-control"]) !!}
            </div>
        </div>
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        {!! Form::radio("gender", "male", true, ["id" => "male", "class"=>"form-check-input"]) !!}
                          {!! Form::label("male", "Male", ["class" =>"form-check-label"]) !!}
                    </div>
                    <div class="form-check">
                        {!! Form::radio("gender", "female", null, ["id"=>"female", "class"=>"form-check-input"]) !!}
                            {!! Form::label("female", "Female", ["class" =>"form-check-label"]) !!}
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="form-group row">
            <div class="col-sm-2">Checkbox</div>
            <div class="col-sm-10">
                <div class="form-check">
{{--                    <input class="form-check-input" type="checkbox" id="gridCheck1">--}}
                    {!! Form::checkbox('service_type1', 'tuns', true, ["class"=>"form-check-input" ]) !!}
{{--                    <label class="form-check-label" for="gridCheck1">--}}
                    {!! Form::label("service_type","hair cut") !!}
{{--                        Example checkbox--}}
{{--                    </label>--}}
                    <br>
                    {!! Form::checkbox('service_type1', '', false, ["class"=>"form-check-input" ]) !!}
                    {!! Form::label("service_type","make-up") !!}

                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </div>
    {!! Form::close() !!}
@endsection
