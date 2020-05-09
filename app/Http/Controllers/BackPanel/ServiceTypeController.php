<?php

namespace App\Http\Controllers\BackPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackPanel\Product\StoreRequest;
use App\Http\Requests\BackPanel\Product\UpdateRequest;
use App\ServiceType;

class ServiceTypeController extends Controller
{
    public function index()
    {
        $service_types = ServiceType::query()
            ->paginate(10);
        return view("back_panel.serviceType.index")
            ->with("service_types", $service_types);
    }

    public function create()
    {
        return view("back_panel.serviceType.create");
    }

    public function store(StoreRequest $request)
    {
        $service_type = new ServiceType();
        $service_type->fill($request->all());
        $service_type->save()

            ->route("ServicesType.index", $service_type);
    }

    public function show($id)
    {
        //
    }
    public function edit(ServiceType $serviceType)
    {
        return view("back_panel.serviceType.edit")
            ->with("service_types", $serviceType);
    }
    public function update(UpdateRequest $request, ServiceType $serviceType)
    {
        $serviceType->name = request("name");
        $serviceType->description = request("description");
        $serviceType->duration = request("duration");
        $serviceType->price = request("price");
        $serviceType->save();
        return redirect()
            ->route("service_types.index");
    }
    public function destroy(ServiceType $serviceType)
    {
        $serviceType->delete();
        return redirect()
            ->route("service_types.index");
    }
}
