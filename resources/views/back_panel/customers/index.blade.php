@extends("back_panel.layout")

@section("header")
    List of customers
@endsection

@section("content")
    @php
        /* @var \App\Customer[] $customers */
    @endphp

    <div class="row">
        <div class="col-8">
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th></th>
                </tr>
                @foreach($customers as $customer)
                    <tr>
                        <th>{{ $customer->id }}</th>
                        <th>{{ $customer->user->name }}</th>
                        <th>{{ $customer->user->email }}</th>
                        <td>{{ $customer->phone }}</td>
                        <td>
                            {!! Form::open(['url' => route('back_panel.customer.destroy',[$customer])]) !!}
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

    {{ $customers->links() }}
@endsection
