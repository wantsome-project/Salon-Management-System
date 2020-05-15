<?php

namespace App\Http\Controllers\BackPanel;

use App\Employee;
use App\Http\Controllers\Controller;
use App\SalaryPayment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SalaryPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $salary_payments = SalaryPayment::query()
            ->with(['employee'])
            ->paginate(5);
        return view("back_panel.salary_payments.index")
            ->with("salary_payments", $salary_payments);
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        /* @var Employee[]|Collection $employees */
        $employees = Employee::query()
            ->with(['user'])
            ->get();

        $employees_arr = [];
        foreach ($employees as $employee) {
            $employees_arr[$employee->id] = $employee->user->name;
        }
        return view("back_panel.salary_payments.create")
            ->with("employees_arr", $employees_arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
//        /* @var Employee $employee */
//        dd($request->all());
        $salary_payment = new SalaryPayment();
        $salary_payment->fill($request->input('salary_payment'));
        $salary_payment->save();

        return redirect()
            ->route("back_panel.salary_payments.index", $salary_payment)
            ->with("success", "Salary payment for ".$salary_payment->employee->user->name." created successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalaryPayment  $salary_payment
     * @return \Illuminate\Http\Response
     */
    public function show(SalaryPayment $salary_payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit(SalaryPayment $salary_payment)
    {
        return view("back_panel.salary_payments.edit")
            ->with("salary_payment", $salary_payment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, SalaryPayment $salary_payment)
    {

        $salary_payment->paid = request("salary_payment.paid");
        $salary_payment->descriptions = request("salary_payment.descriptions");
        $salary_payment->save();

        return redirect()
            ->route("back_panel.salary_payments.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalaryPayment  $salary_payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalaryPayment $salary_payment)
    {
        //
    }
}
