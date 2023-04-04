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
            ->with(['user', 'serviceType'])
            ->paginate(10);

        if (request()->wantsJson()) {
            return response()->json($employees);
        } else {
            return view("front_panel.pages.staff.index")
                ->with("employees", $employees);
        }

    }

    /**
     * Show the form for creating a new resource.

     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

//    public function getEmployeesByProvidedServiceType(Request $request)
//    {
//        $service_type_id = $request->input("service_type_id");
//        if (is_null($service_type_id)) {
//            return "empty service type value";
//        }
//
//        $employees = Employee::query()
//            ->with('user')
//            ->where('service_type_id', '=', $service_type_id)
//            ->get()
//            ->pluck('user.name', 'id')
//            ->toArray();
//
//        return view("front_panel.pages.employees", compact('employees'));
//    }
    public function getEmployeesByProvidedServiceType(Request $request)
    {
        $service_type_id = $request->input("service_type_id");
        if (is_null($service_type_id)) {
            return "empty service type value";
        }

        $employees = Employee::query()
            ->with('user')
            ->where('service_type_id', '=', $service_type_id)
            ->get()
            ->makeHidden(["payroll", "phone"]);

        if ($request->wantsJson()) {
            return response()->json($employees);
        } else {
            return $employees;
        }


    }
}
