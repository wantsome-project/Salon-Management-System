@php
    /* @var \App\ServiceType[] $service_types */
@endphp
<div class="card-deck">
    @foreach($service_types as $service_type)
        <div class="card">
            @if($service_type->photo_name)
            <img src="{{ $service_type->getPhotoUrl() }}" class="card-img-top" alt="...">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $service_type->name }}</h5>
                <h6 class="card-text"> <strong>Duration:</strong> {{$service_type->duration." minutes"}} </h6>
                <h6 class="card-text"><strong>Price: </strong>{{$service_type->price. " euro"}} </h6>
            </div>
        </div>
    @endforeach
</div>
