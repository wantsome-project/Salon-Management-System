@extends("back_panel.layout")

@section("header")
    List of services
    <a href="{{ route("back_panel.services.create") }}" class="btn btn-primary float-right">Add new service</a>
@endsection

@section("content")
    @php
        /* @var \App\Service[]     $services */
    @endphp

    <div class="row">
        <div class="col-8">
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Employee </th>
                    <th>Customer </th>
                    <th>Service type</th>
                    <th>Total to be paid</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($services as $service)
                    <tr>
                        <th>{{ $service->id }}</th>
                        <th>{{ $service->employee->user->name }}</th>
                        <th>{{ $service->customer->user->name }}</th>
                        <th>{{ $service->serviceType->name }}</th>
                        <td>{{ ($service->price)." euro" }}</td>
                        <td><a href="{{ route('back_panel.services.PDF', $service) }}"><i class="fas fa-file-pdf"></i></a></td>
                        <td><a href="{{ route('back_panel.services.edit', $service) }}"><i class="fas fa-edit"></i></a></td>
                        <td>
                            {!! Form::open(['url' => route('back_panel.services.destroy',[$service])]) !!}
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

    {{ $services->links() }}
@endsection
