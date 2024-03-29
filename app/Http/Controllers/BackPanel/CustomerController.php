<?php

namespace App\Http\Controllers\BackPanel;

use App\Customer;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $customers = Customer::query()
            ->with(['user'])
            ->paginate(10);
        return view("back_panel.customers.index")
            ->with("customers", $customers);
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
     * @param Customer $customer
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Customer $customer)
    {
        $user = $customer->user;
        $customer->delete();
        if (empty($user->customer_id) && empty($user->is_admin)) {
            $user->delete();
        }
        return redirect()
            ->route("back_panel.customers.index")
            ->with("success", "Customer ".$user->name." deleted successfully");
    }
}
