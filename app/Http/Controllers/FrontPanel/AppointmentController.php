<?php

namespace App\Http\Controllers\FrontPanel;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Appointment;
use App\Http\Requests\FrontPanel\Appointment\StoreRequest;
use App\ServiceType;
use App\User;
use App\UserRoles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $time_ranges = [
            '09:00:00' => '09:00-09:30',
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
            '15:30:00' => '16:30-17:00',
        ];
        $service_types = ServiceType::query()
            ->get()
            ->pluck('name', 'id')
            ->toArray();

        $service_type_id = array_key_first($service_types);
        $employees = [];
        if (!is_null($service_type_id)) {
            $employees = Employee::query()
                ->with('user')
                ->where('service_type_id', '=', $service_type_id)
                ->get()
                ->pluck('user.name', 'id')
                ->toArray();
        }


        return view("front_panel.pages.appointments", compact("employees", "service_types", "time_ranges"));
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
        $appointment->appointment_date = request('appointment.appointment_date');

        $appointment->save();

        return redirect()
            ->route('appointment.index')
            ->with("success", "Appointment created, you will be contacted as soon as possible for confirmation.");;
    }
}

