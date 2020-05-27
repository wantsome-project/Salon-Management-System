<?php

namespace App\Http\Controllers\BackPanel;

use App\Appointment;
use App\Customer;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackPanel\Appointment\StoreRequest;
use App\Http\Requests\BackPanel\Appointment\UpdateRequest;
use App\ServiceType;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::paginate();
        return view("back_panel.appointment.index")
            ->with("appointments", $appointments);
    }

    public function create()
    {
        {
            /* @var Customer[]|Collection $customers */
            $customers = Customer::query()
                ->with(['user'])
                ->get();

            $customers_appointment = [];
            foreach ($customers as $customer) {
                $customers_appointment[$customer->id] = $customer->user->name;
            }
            /* @var Employee[]|Collection $employees */
            $employees = Employee::query()
                ->with(['user'])
                ->get();

            $employees_appointment = [];
            foreach ($employees as $employee) {
                $employees_appointment[$employee->id] = $employee->user->name;
            }
            /* @var ServiceType[]|Collection $service_types */
            $service_types = ServiceType::query()
                ->get();
            $service_type_names =[];
            foreach ($service_types as $service_type) {
                $service_type_names[$service_type->id] = $service_type->name;
            }
            return view("back_panel.appointment.create")
                ->with("employees_appointment", $employees_appointment)
                ->with("customers_appointment", $customers_appointment)
                ->with("service_type_names",$service_type_names);
        }
    }

    public function store(StoreRequest $request)
    {
        $appointments = new Appointment();
        $appointments->fill($request->input("appointment"));
        $appointments->save();

        return redirect()->route("back_panel.appointment.index");
    }

    public function show($appointment)
    {
        /* @var Customer[]|Collection $customers */
        $customers = Customer::query()
            ->with(['user'])
            ->get();

        $customers_appointment = [];
        foreach ($customers as $customer) {
            $customers_appointment[$customer->id] = $customer->user->name;
        }

        /* @var Employee[]|Collection $employees */
        $employees = Employee::query()
            ->with(['user'])
            ->get();

        $employees_appointment = [];
        foreach ($employees as $employee) {
            $employees_appointment[$employee->id] = $employee->user->name;
        }
        /* @var ServiceType[]|Collection $service_types */
        $service_types = ServiceType::query()
            ->get();
        $service_type_names =[];
        foreach ($service_types as $service_type) {
            $service_type_names[$service_type->id] = $service_type->name;
        }
        return view("back_panel.appointment.show")
            ->with("appointment", $appointment)
            ->with("employees_appointment", $employees_appointment)
            ->with("customers_appointment", $customers_appointment)
            ->with("service_type_names",$service_type_names);
    }

    public function edit(Appointment $appointment)
    {
        /* @var Customer[]|Collection $customers */
        $customers = Customer::query()
            ->with(['user'])
            ->get();

        $customers_appointment = [];
        foreach ($customers as $customer) {
            $customers_appointment[$customer->id] = $customer->user->name;
        }

        /* @var Employee[]|Collection $employees */
        $employees = Employee::query()
            ->with(['user'])
            ->get();

        $employees_appointment = [];
        foreach ($employees as $employee) {
            $employees_appointment[$employee->id] = $employee->user->name;
        }
        /* @var ServiceType[]|Collection $service_types */
        $service_types = ServiceType::query()
            ->get();
        $service_type_names =[];
        foreach ($service_types as $service_type) {
            $service_type_names[$service_type->id] = $service_type->name;
        }
        return view("back_panel.appointment.edit")
            ->with("appointment", $appointment)
            ->with("employees_appointment", $employees_appointment)
            ->with("customers_appointment", $customers_appointment)
            ->with("service_type_names",$service_type_names);
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
