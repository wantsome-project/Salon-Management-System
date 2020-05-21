@extends("back_panel.layout")

@section("header")
    Requests
@endsection

@section("content")
    @php
        /* @var \App\CustomerRequest $customer_request */
    @endphp
    <div class="row">
        <div class="col-2">
            <h5>Request details</h5>
            <table class="thead-dark table table-striped">
                <tr>
                    <th>Name:</th>
                    <td>{{ $customer_request->name}}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $customer_request->email }}</td>
                </tr>

                <tr>
                    <th>Phone:</th>
                    <td>{{ $customer_request->phone}}</td>
                </tr>

                <tr>
                    <th>Subject:</th>
                    <td>{{ $customer_request->subject }}</td>
                </tr>
                <tr>
                    <th>Message:</th>
                    <td>{{ $customer_request->message }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
