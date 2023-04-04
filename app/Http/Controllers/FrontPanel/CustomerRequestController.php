<?php

namespace App\Http\Controllers\FrontPanel;

use App\CustomerRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\FrontPanel\CustomerRequest\StoreRequest;
use Illuminate\Http\Request;

class CustomerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
        $customer_request->name = request('name');
        $customer_request->email = request('email');
        $customer_request->phone = request('phone');
        $customer_request->subject = request('subject');
        $customer_request->message = request('message');
        $customer_request->save();

        if($request->ajax() || $request->api === true) {
            return response()->json(['message' => "Message sent successfully, you will be contacted as soon as possible."]);
        } else {
            return redirect()
            ->route("customer_requests.create")
            ->with("success", "Message sent successfully, you will be contacted as soon as possible.");
        }

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
