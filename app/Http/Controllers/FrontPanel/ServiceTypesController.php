<?php

namespace App\Http\Controllers\FrontPanel;

use App\Http\Controllers\Controller;
use App\ServiceType;
use Illuminate\Http\Request;

class ServiceTypesController extends Controller
{
    /**
     * Display a listing of the resource.

     */
    public function index()
    {
        $service_types = ServiceType::query()
            ->paginate(10);
        return view("front_panel.pages.service_type.index")
            ->with("service_types", $service_types);
    }
}
