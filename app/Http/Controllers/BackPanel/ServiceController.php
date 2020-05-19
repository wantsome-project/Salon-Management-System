<?php

namespace App\Http\Controllers\BackPanel;

use App\Customer;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackPanel\Service\StoreRequest;
use App\Service;
use App\ServiceType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $services = Service::query()
            ->with(['employee'])
            ->with(['customer'])
            ->with(["serviceType"])
            ->orderBy('id', "desc")
            ->paginate(25);
        return view("back_panel.services.index")
            ->with("services", $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        /* @var Customer[]|Collection $customers */
        $customers = Customer::query()
            ->with(['user'])
            ->get();

        $customers_services = [];
        foreach ($customers as $customer) {
            $customers_services[$customer->id] = $customer->user->name;
        }
        /* @var Employee[]|Collection $employees */
        $employees = Employee::query()
            ->with(['user'])
            ->get();

        $employees_services = [];
        foreach ($employees as $employee) {
            $employees_services[$employee->id] = $employee->user->name;
        }
        /* @var ServiceType[]|Collection $service_types */
        $service_types = ServiceType::query()
            ->get();
        $service_type_names =[];
        foreach ($service_types as $service_type) {
            $service_type_names[$service_type->id] = $service_type->name."/".$service_type->price." euro";
        }
        return view("back_panel.services.create")
            ->with("customers_services", $customers_services)
            ->with("employees_services", $employees_services)
            ->with('service_type_names', $service_type_names);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreRequest $request)
    {
        $service = new Service();
        $service->fill($request->input('service'));
        $service->save();

        return redirect()
            ->route("back_panel.services.index", $service)
            ->with("success", "Service payment for ".$service->customer->user->name." created successfully");
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
}
