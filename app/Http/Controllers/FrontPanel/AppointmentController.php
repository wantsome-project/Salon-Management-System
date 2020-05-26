<?php

namespace App\Http\Controllers\FrontPanel;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Appointment;
use App\Http\Requests\FrontPanel\Appointment\StoreRequest;
use App\ServiceType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $time_ranges = [
            '09:00:00' => '09:00-9:30',
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
            '15:30:00' => '16:30-17:00',
        ];
        $employees = Employee::query()
            ->with('user')
            ->get()
            ->pluck('user.name', 'id')
            ->toArray();
        $service_types = ServiceType::query()
            ->get()
            ->pluck('name', 'id')
            ->toArray();

        return view("front_panel.pages.appointments", compact("employees", "service_types", "time_ranges"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreRequest $request)
    {
        $appointment = new Appointment;
        $appointment->employee_id = request("appointment.employee_id");
        $appointment->service_type_id = request("appointment.service_type_id");
        $appointment->customer_id = auth()->user()->customer->id;
        $appointment->status = Appointment::STATUS_ON_HOLD;
        $appointment->appointment_time = request("appointment.appointment_time");
        $appointment->appointment_date = new Carbon($appointment->appointment_date);
        $appointment->save();

        return redirect()
            ->route('appointment.index')
            ->with("success", "Appointment created, you will be contacted as soon as possible for confirmation.");;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

