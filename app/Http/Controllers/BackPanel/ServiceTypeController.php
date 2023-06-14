<?php

namespace App\Http\Controllers\BackPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackPanel\ServiceType\StoreRequest;
use App\Http\Requests\BackPanel\ServiceType\UpdateRequest;
use App\ServiceType;
use Exception;

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
        $service_type->fill($request->input("service_type"));
        $service_type->save();

        if ($request->hasFile('service_type.image')) {
            $uploaded_file = $request->file("service_type.image");
            $file_name = $service_type->id.".".$uploaded_file->extension();
            $path = $uploaded_file
                ->storeAs("assets/service_type_images", $file_name, 'public');
            $service_type->photo_name = $file_name;
            $service_type->save();
        }

        return redirect()
            ->route("back_panel.service_types.index")
            ->with('success', 'New service type successfully added.');
    }

    public function show($id)
    {
        //
    }
    public function edit(ServiceType $serviceType)
    {
        return view("back_panel.serviceType.edit")
            ->with("service_type", $serviceType);
    }
    public function update(UpdateRequest $request, ServiceType $serviceType)
    {
        $serviceType->name = request("service_type.name");
        $serviceType->description = request("service_type.description");
        $serviceType->duration = request("service_type.duration");
        $serviceType->price = request("service_type.price");
        $serviceType->save();

        if ($request->hasFile('service_type.image')) {
            $uploaded_file = $request->file("service_type.image");
            $file_name = $serviceType->id.".".$uploaded_file->extension();
            $path = $uploaded_file
                ->storeAs("assets/service_type_images", $file_name, 'public');
            $serviceType->photo_name = $file_name;
            $serviceType->save();
        }
        return redirect()->route("back_panel.service_types.index");
    }

    /**
     * @throws Exception
     */
    public function destroy(ServiceType $serviceType)
    {
        $serviceType->delete();
        return redirect()
            ->route("back_panel.service_types.index");
    }
}
