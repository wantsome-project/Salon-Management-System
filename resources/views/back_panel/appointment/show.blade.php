@extends("back_panel.layout")

@section("header")
    Appointments
@endsection

@section("content")
    @php
        /* @var \App\Appointment $appointment */
    @endphp
    <div class="row">
        <div class="col-2">
            <h5>Request details</h5>
            <table class="thead-dark table table-striped">
                <tr>
                    <th>Customer:</th>
                    <td>{{ $appointment->customer_id}}</td>
                </tr>
                <tr>
                    <th>Employee:</th>
                    <td>{{ $appointment->employee_id }}</td>
                </tr>

                <tr>
                    <th>Service Type</th>
                    <td>{{ $appointment->service_type_id}}</td>
                </tr>

                <tr>
                    <th>Status:</th>
                    <td>{{ $appointment->status }}</td>
                </tr>
                <tr>
                    <th>Time:</th>
                    <td>{{ $appointment->appointment_time }}</td>
                </tr>
                <tr>
                    <th>Date:</th>
                    <td>{{ $appointment->appointment_date }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
