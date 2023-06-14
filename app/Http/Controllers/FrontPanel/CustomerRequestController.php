<?php

namespace App\Http\Controllers\FrontPanel;

use App\CustomerRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\FrontPanel\CustomerRequest\StoreRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class CustomerRequestController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("front_panel.pages.contact_request.create");
    }

    /**
     * Store a newly created resource in storage.
     *


     */
    public function store(StoreRequest $request)
    {
        $customer_request = new CustomerRequest();
        $customer_request->name = request('customer_request.name');
        $customer_request->email = request('customer_request.email');
        $customer_request->phone = request('customer_request.phone');
        $customer_request->subject = request('customer_request.subject');
        $customer_request->message = request('customer_request.message');
        $customer_request->save();

        return redirect()
            ->route("customer_requests.create")
            ->with("success", "Message sent successfully, you will be contacted as soon as possible.");

    }
}
