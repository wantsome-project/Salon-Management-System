@extends("back_panel.layout")

@section("header")
    List of appointments
    <a href="{{ route("back_panel.appointment.create") }}" class="btn btn-primary float-right">Add new appointment</a>
@endsection

@section("content")
    @php
        /* @var \App\Appointment[]     $appointments */
    @endphp

    <div class="row">
        <div class="col-8">
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Employee </th>
                    <th>Customer </th>
                    <th>Service type</th>
                    <th>Status</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($appointments as $appointment)
                    <tr>
                        <th>{{ $appointment->id }}</th>
                        <th>{{ $appointment->employee->user->name }}</th>
                        <th>{{ $appointment->customer->user->name }}</th>
                        <th>{{ $appointment->serviceType->name }}</th>
                        <td>{{ ($appointment->status) }}</td>
                        <td>{{ ($appointment->appointment_time) }}</td>
                        <td>{{ ($appointment->appointment_date)}}</td>
                        <td><a href="{{ route('back_panel.appointment.edit', $appointment) }}"><i class="fas fa-edit"></i></a></td>
                        <td>
                            {!! Form::open(['url' => route('back_panel.appointment.destroy',[$appointment])]) !!}
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

    {{ $appointments->links() }}
@endsection
