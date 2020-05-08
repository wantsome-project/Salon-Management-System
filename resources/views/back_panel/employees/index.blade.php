@extends("back_panel.layout")

@section("header")
    List of employees
    <a href="{{ route("back_panel.employees.create") }}" class="btn btn-primary float-right">Add new employee</a>
@endsection

@section("content")
    @php
        /* @var \App\Employee[] $employees */
    @endphp

    <div class="row">
        <div class="col-8">
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Payroll</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($employees as $employee)
                    <tr>
                        <th>{{ $employee->id }}</th>
                        <th>{{ $employee->user->name }}</th>
                        <th>{{ $employee->user->email }}</th>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->payroll }}</td>
                        <td><a href="{{ route('back_panel.employees.edit', $employee) }}"><i class="fas fa-edit"></i></a></td>
                        <td>
                            {!! Form::open(['url' => route('back_panel.employees.destroy',[$employee])]) !!}
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

    {{ $employees->links() }}
@endsection
