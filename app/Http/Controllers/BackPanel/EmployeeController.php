<?php

namespace App\Http\Controllers\BackPanel;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackPanel\Employee\StoreRequest;
use App\Http\Requests\BackPanel\Employee\UpdateRequest;
use App\SalaryPayment;
use App\User;
use App\UserRoles;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */

    public function index()
    {
        $employees = Employee::query()
            ->with(['user'])
            ->paginate(10);
        return view("back_panel.employees.index")
            ->with("employees", $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */

    public function create()
    {
        return view("back_panel.employees.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request Request
     *
     */
    public function store(StoreRequest $request)
    {
        // try find user using email, possible to be created as customers
        /* @var User $user */
        $user = User::query()
            ->where('email', '=', $request->input('user.email'))
            ->first();

        //if user not exist, create one
        if ($user) {
            if ($user->employee) {
                return redirect()
                    ->back()
                    ->withInput($request->all())
                    ->with("warning", "Employee already exist!");
            }
        } else {
            $user = new User($request->input('user'));
            $user->role_id = UserRoles::EMPLOYEE;
            $user->password = \Hash::make($request->input('user.password'));
            $user->save();
        }

        $employee = new Employee();
        $employee->fill($request->input("employee"));
        $employee->user_id = $user->id;
        $employee->payroll = $request->input("employee.payroll");
        $employee->save();

        return redirect()
            ->route("back_panel.employees.index", $employee)
            ->with("success", "Employee $user->name created successfully");
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

     */
    public function edit(Employee $employee)
    {
        return view("back_panel.employees.edit")
            ->with("employee", $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdateRequest $request, Employee $employee)
    {
        $employee->user->name = request("user.name");
        $employee->user->save();
        $employee->phone = request("employee.phone");
        $employee->payroll = request("employee.payroll");
        $employee->save();

        return redirect()
            ->route("back_panel.employees.index");
    }

    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy(Employee $employee)
    {
        // delete employee throw user foreign key
        $employee->user->delete();
        return redirect()
            ->route("back_panel.employees.index")
            ->with("success", "Employee ".$employee->user->name." deleted successfully");
    }
}
