<?php

namespace App\Http\Controllers\FrontPanel;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $employees = Employee::query()
            ->with(['user'])
            ->paginate(10);
        return view("front_panel.pages.staff.index")
            ->with("employees", $employees);
    }

    public function getEmployeesByProvidedServiceType(Request $request)
    {
        $service_type_id = $request->input("service_type_id");
        if (is_null($service_type_id)) {
            return "empty service type value";
        }

        return Employee::query()
            ->with('user')
            ->where('service_type_id', '=', $service_type_id)
            ->get()
            ->makeHidden(["payroll", "phone"]);
    }
}
