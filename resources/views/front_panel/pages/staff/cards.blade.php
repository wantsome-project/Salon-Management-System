@php
    /* @var \App\Employee[] $employees */
@endphp
<div class="card-deck">
    @foreach($employees as $employee)
        <div class="card">
            @if($employee->photo_name)
            <img src="{{ $employee->getPhotoUrl() }}" class="card-img-top" alt="...">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $employee->user->name }}</h5>
                <p class="card-text">{{"Position: ". $employee->serviceType->name}}</p>
            </div>
        </div>
    @endforeach
</div>
