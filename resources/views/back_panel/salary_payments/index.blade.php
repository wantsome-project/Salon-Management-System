@extends("back_panel.layout")

@section("header")
    Employee salaries
    <a href="{{ route("back_panel.salary_payments.create") }}" class="btn btn-primary float-right">Add salary payment</a>

@endsection

@section("content")
    @php
        /* @var \App\SalaryPayment[] $salary_payments */
    @endphp

    <div class="row">
        <div class="col-8">
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Employee name</th>
                    <th>Paid amount</th>
                    <th>Payment details</th>
                    <th>Paid at</th>
                    <th>Updated at</th>
                    <th colspan="2">Actions</th>
                </tr>
                @foreach($salary_payments as $salary_payment)
                    <tr>
                        <th>{{ $salary_payment->id }}</th>
                        <th>{{ $salary_payment->employee->user->name }}</th>
                        <th>{{ $salary_payment->paid }}</th>
                        <td>{{ $salary_payment->description }}</td>
                        <td>{{ $salary_payment->created_at }}</td>
                        <td>{{ $salary_payment->updated_at }}</td>
                        <td><a href="{{ route('back_panel.salary_payments.edit', $salary_payment) }}"><i class="fas fa-edit"></i></a></td>
                        <td>
                            {!! Form::open(['url' => route('back_panel.salary_payments.destroy',[$salary_payment])]) !!}
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

    {{ $salary_payments->links() }}
@endsection
