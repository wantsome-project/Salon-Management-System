<?php

namespace App\Http\Controllers\BackPanel;

use App\Appointment;
use App\Customer;
use App\Employee;
use App\Events\CustomerAppointmentStatusEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackPanel\Appointment\StoreRequest;
use App\Http\Requests\BackPanel\Appointment\UpdateRequest;
use App\ServiceType;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class AppointmentController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $appointments = Appointment::paginate();
        return view("back_panel.appointment.index")
            ->with("appointments", $appointments);
    }

    /**
     * @return Application|Factory|View
     */
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
            $service_type_names = [];
            foreach ($service_types as $service_type) {
                $service_type_names[$service_type->id] = $service_type->name;
            }
            $status_appointment = ['Confirmed' => 'Confirmed', 'OnHold' => 'OnHold', 'Canceled' => 'Canceled'];
            $time_appointment = ['09:00:00' => '09:00-9:30',
                '09:30:00' => '9:30-10:00',
                '10:00:00' => '10:00-10:30',
                '10:30:00' => '10:30-11:00',
                '11:00:00' => '11:00-11:30',
                '11:30:00' => '11:30-12:00',
                '12:00:00' => '12:30-13:00',
                '12:30:00' => '13:30-14:00',
                '13:00:00' => '14:00-14:30',
                '13:30:00' => '14:30-15:00',
                '14:00:00' => '15:00-15:30',
                '14:30:00' => '15:30-16:00',
                '15:00:00' => '16:00-16:30',
                '15:30:00' => '16:30-17:00',];
            return view("back_panel.appointment.create")
                ->with("employees_appointment", $employees_appointment)
                ->with("customers_appointment", $customers_appointment)
                ->with("service_type_names", $service_type_names)
                ->with("status_appointment", $status_appointment)
                ->with("time_appointment", $time_appointment);
        }
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $appointment = new Appointment();
        $appointment->fill($request->input("appointment"));
        $appointment->appointment_date = new Carbon($appointment->appointment_date);
        $appointment->save();


        return redirect()
            ->route("back_panel.appointment.index")
            ->with("success", "Appointment for ".$appointment->customer->user->name." created successfully");
    }

    /**
     * @param $appointment
     * @return Application|Factory|View
     */
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
        $service_type_names = [];
        foreach ($service_types as $service_type) {
            $service_type_names[$service_type->id] = $service_type->name;
        }
        return view("back_panel.appointment.show")
            ->with("appointment", $appointment)
            ->with("employees_appointment", $employees_appointment)
            ->with("customers_appointment", $customers_appointment)
            ->with("service_type_names", $service_type_names);
    }

    /**
     * @param Appointment $appointment
     * @return Application|Factory|View
     */
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
        $service_type_names = [];
        foreach ($service_types as $service_type) {
            $service_type_names[$service_type->id] = $service_type->name;
        }
        $status_appointment = ['Confirmed' => 'Confirmed', 'OnHold' => 'OnHold', 'Canceled' => 'Canceled'];

        $time_appointment = ['09:00:00' => '09:00-9:30',
            '09:30:00' => '09:30-10:00',
            '10:00:00' => '10:00-10:30',
            '10:30:00' => '10:30-11:00',
            '11:00:00' => '11:00-11:30',
            '11:30:00' => '11:30-12:00',
            '12:00:00' => '12:30-13:00',
            '12:30:00' => '13:30-14:00',
            '13:00:00' => '14:00-14:30',
            '13:30:00' => '14:30-15:00',
            '14:00:00' => '15:00-15:30',
            '14:30:00' => '15:30-16:00',
            '15:00:00' => '16:00-16:30',
            '15:30:00' => '16:30-17:00',];

        return view("back_panel.appointment.edit")
            ->with("appointment", $appointment)
            ->with("employees_appointment", $employees_appointment)
            ->with("customers_appointment", $customers_appointment)
            ->with("service_type_names", $service_type_names)
            ->with("status_appointment", $status_appointment)
            ->with("time_appointment", $time_appointment);
    }

    /**
     * @param UpdateRequest $request
     * @param Appointment $appointment
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Appointment $appointment)
    {

        $appointment->customer_id = request("appointment.customer_id");
        $appointment->employee_id = request("appointment.employee_id");
        $appointment->service_type_id = request("appointment.service_type_id");
        $appointment->status = request("appointment.status");
        $appointment->appointment_time = request("appointment.appointment_time");
        $appointment->appointment_date = request('appointment.appointment_date');

        /* @var Customer[]|Collection $customers */
        $customers = Customer::query()
            ->with(['user'])
            ->get();

        $customers_appointment = [];
        foreach ($customers as $customer) {
            $customers_appointment[$customer->id] = $customer->user->name;
        }

        /* @var ServiceType[]|Collection $service_types */
        $service_types = ServiceType::query()
            ->get();
        $service_type_names = [];
        foreach ($service_types as $service_type) {
            $service_type_names[$service_type->id] = $service_type->name;
        }

        event( new CustomerAppointmentStatusEvent($appointment));
        $appointment->save();
        return redirect()
            ->route("back_panel.appointment.index");
    }

    /**
     * @param Appointment $appointment
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()
            ->route("back_panel.appointment.index");
    }
}
