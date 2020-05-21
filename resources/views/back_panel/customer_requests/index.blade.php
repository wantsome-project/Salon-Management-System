@extends("back_panel.layout")

@section("header")
    Requests
@endsection

@section("content")
    @php
        /* @var \App\CustomerRequest[] $customer_requests */
    @endphp

    <div class="row">
        <div class="col-8">
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($customer_requests as $customer_request)
                    <tr>
                        <th>{{ $customer_request->id }}</th>
                        <th>{{ $customer_request->name }}</th>
                        <td>{{ $customer_request->subject }}</td>
                        <td><a href="{{ route('back_panel.customer_requests.show', $customer_request) }}"><i class="fas fa-eye"></i></a></td>
                        <td>
                            {!! Form::open(['url' => route('back_panel.customer_requests.destroy',[$customer_request])]) !!}
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

    {{ $customer_requests->links() }}
@endsection
