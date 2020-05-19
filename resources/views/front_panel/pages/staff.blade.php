@extends("front_panel.layout")
@section("header")
    Our team
@endsection

@section("content")
    @php
        /* @var \App\Employee[] $employees */
    @endphp
    <div class="card-group">
        @foreach($employees as $employee)
        <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $employee->user->name }}</h5>
                <p class="card-text">{{"Position: ". $employee->title}}</p>
            </div>
        </div>
        @endforeach
    </div>

@endsection
