<?php
@extends("back_panel.layout")

@section("header")
    List services
    <a href="{{ route("back_panel.service_types.create") }}" class="btn btn-primary float-right">Add new service type</a>
@endsection

@section("content")
    @php
        /* @var \App\ServiceType[] $service_type */
    @endphp

    <div class="row">
        <div class="col-8">
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($service_type as $serviceType)
                    <tr>
                        <th>{{ $serviceType->id }}</th>
                        <th>{{ $serviceType->name }}</th>
                        <th>{{ $serviceType->description }}</th>
                        <td>{{ $serviceType->duration }}</td>
                        <td>{{ $serviceType->price    }}</td>
                        <td><a href="{{ route('back_panel.service_types.edit', $serviceType) }}"><i class="fas fa-edit"></i></a></td>
                        <td>
                            {!! Form::open(['url' => route('back_panel.service_type.destroy',[$serviceType])]) !!}
                            @csrf
                            @method("delete")
                            <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    {{ $service_type->links() }}
@endsection
