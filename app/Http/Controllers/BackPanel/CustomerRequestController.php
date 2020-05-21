<?php

namespace App\Http\Controllers\BackPanel;

use App\CustomerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $customer_requests = CustomerRequest::query()
            ->orderBy('id', "desc")
            ->paginate(10);
        return view("back_panel.customer_requests.index")
            ->with("customer_requests", $customer_requests);
    }

    /**
     * Show the form for creating a new resource.
     *
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

    }

    /**
     * Display the specified resource.
     *

     */
    public function show(CustomerRequest $customer_request)
    {
        return view("back_panel.customer_requests.show")
            ->with("customer_request", $customer_request);
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

     */
    public function destroy(CustomerRequest $customer_request)
    {
        $customer_request->delete();
        return redirect()
            ->route("back_panel.customer_requests.index");
    }
}
