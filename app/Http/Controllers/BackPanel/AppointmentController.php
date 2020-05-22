<?php

namespace App\Http\Controllers\BackPanel;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackPanel\Appointment\StoreRequest;
use App\Http\Requests\BackPanel\Appointment\UpdateRequest;
use App\ServiceType;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::query()
            ->paginate(10);
        return view("back_panel.appointment.index")
            ->with("appointments", $appointments);
    }

    public function create()
    {
        return view("back_panel.appointment.create");
    }

    public function store(StoreRequest $request)
    {
        $appointments = new Appointment();
        $appointments->fill($request->input("appointment"));
        $appointments->save();

        return redirect()->route("back_panel.appointment.index");
    }

    public function show($id)
    {
        //
    }
    public function edit(Appointment $appointment)
    {
        return view("back_panel.appointment.edit")
            ->with("appointment", $appointment);
    }
    public function update(UpdateRequest $request, Appointment $appointment)
    {
        $appointment->customer_id = request("appointments.customer_id");
        $appointment->employee_id = request("appointments.employee_id");
        $appointment->service_type_id = request("appointments.service_type_id");
        $appointment->status = request("appointments.status");
        $appointment->appointment_time = request("appointment_time");
        $appointment->appointment_date = request("appointment_date");
        $appointment->save();
        return redirect()->route("back_panel.appointment.index");
    }
    public function destroy(ServiceType $appointment)
    {
        $appointment->delete();
        return redirect()
            ->route("back_panel.appointment.index");
    }
}
