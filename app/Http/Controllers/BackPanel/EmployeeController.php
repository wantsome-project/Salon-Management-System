<?php

namespace App\Http\Controllers\BackPanel;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\BackPanel\Employee\StoreRequest;
use App\Http\Requests\BackPanel\Employee\UpdateRequest;
use App\SalaryPayment;
use App\ServiceType;
use App\User;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */

    public function index()
    {
        $employees = Employee::query()
            ->with(['user'])
            ->paginate(10);

        foreach ($employees as $employee) {
            $start = Carbon::now()->startOfMonth();
            $employee->paid_amount = $employee->salary_payments()
                ->where('created_at', ">=", $start)
                ->sum('paid');
        }

        return view("back_panel.employees.index")
            ->with("employees", $employees);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */

    public function create()
    {

        /* @var ServiceType[]|Collection $service_types */
        $service_types = ServiceType::query()
            ->get();
        $service_type_names =[];
        foreach ($service_types as $service_type) {
            $service_type_names[$service_type->id] = $service_type->name;
        }
        return view("back_panel.employees.create")
            ->with('service_type_names', $service_type_names);
    }

    /**
     * Store a newly created resource in storage.

     * @param StoreRequest $request Request
     *
     */
    public function store(StoreRequest $request)
    {
        // try find user using email, possible to be created as customers
        /* @var User $user */

        $employee = new Employee();
        $employee->fill($request->input("employee"));
        $employee->payroll = $request->input("employee.payroll");
        $employee->service_type_id = $request->input("employee.service_type_id");
        $employee->save();

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
            $user->password = \Hash::make($request->input('user.password'));
        }
        $user->employee_id = $employee->id;
        $user->save();

        if ($request->hasFile('employee.image')) {
            $uploaded_file = $request->file("employee.image");
            $file_name = $employee->id.".".$uploaded_file->extension();
            $path = $uploaded_file
                ->storeAs("assets/employees_images", $file_name, 'public');
            $employee->photo_name = $file_name;
            $employee->save();
        }

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
        /* @var ServiceType[]|Collection $service_types */
        $service_types = ServiceType::query()
            ->get();
        $service_type_names =[];
        foreach ($service_types as $service_type) {
            $service_type_names[$service_type->id] = $service_type->name;
        }
        return view("back_panel.employees.edit")
            ->with("employee", $employee)
            ->with('service_type_names', $service_type_names);;
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdateRequest $request, Employee $employee)
    {
        $employee->user->name = request("user.name");
        $employee->user->save();
        $employee->service_type_id = request("employee.service_type_id");
        $employee->phone = request("employee.phone");
        $employee->payroll = request("employee.payroll");
        $employee->save();

        if ($request->hasFile('employee.image')) {
            $uploaded_file = $request->file("employee.image");
            $file_name = $employee->id.".".$uploaded_file->extension();
            $path = $uploaded_file
                ->storeAs("assets/employees_images", $file_name, 'public');
            $employee->photo_name = $file_name;
            $employee->save();
        }
        return redirect()
            ->route("back_panel.employees.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws Exception
     */
    public function destroy(Employee $employee)
    {
        // delete employee throw user foreign key
        $user = $employee->user;
        $employee->delete();
        if (empty($user->customer_id) && empty($user->is_admin)) {
            $user->delete();
        }
        return redirect()
            ->route("back_panel.employees.index")
            ->with("success", "Employee ".$user->name." deleted successfully");
    }

}
