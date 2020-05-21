@php
    /* @var \App\ServiceType[] $service_types */
@endphp
<div class="card-deck">
    @foreach($service_types as $service_type)
        <div class="card">
            <img src="{{ asset ("assets/service_type_images/".$service_type->id.".jpg")}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $service_type->name }}</h5>
                <h6 class="card-text"> <strong>Duration:</strong> {{$service_type->duration." minutes"}} </h6>
                <h6 class="card-text"><strong>Price: </strong>{{$service_type->price. " euro"}} </h6>
            </div>
        </div>
    @endforeach
</div>
