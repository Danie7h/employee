<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\employee;
use Illuminate\Http\Request;
use App\Models\SalaryIncrement;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::select('*', 'employees.id as id')
            ->join('roles', 'roles.id', '=', 'employees.role_id')
            ->where('employees.name', 'LIKE', '%'.$request->q.'%')
            ->orWhere('employees.lastname', 'LIKE', '%'.$request->q.'%')
            ->paginate(5);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required','string','max:255'],
            'lastname' => ['required','string','max:255'],
            'role' => ['required','max:50'],
            'salary' => ['required','integer'],
            'gender' => ['required','string','in:m,f']
        ]);

        $role = new Role();
        $role->role=$request->role;
        $role->salary=$request->salary;
        $role->save();

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->lastname = $request->lastname;
        $employee->role_id = $role->id;
        $employee->gender = $request->gender;
        $employee->save();

        $this->saveHistory($request, $employee->id, $role->id);
    
        return redirect()->route('employee.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        $role = Role::find($employee->role_id);
        return view('employee.update', compact('employee', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employee $employee)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'lastname' => ['required','string','max:255'],
            'role' => ['required','max:50'],
            'salary' => ['required','integer'],
            'gender' => ['required','string','in:m,f']
        ]);

        $role = Role::find($employee->role_id);
        if ($role->role != $request->role) {
            $newRole = new Role();
            $newRole->role = $request->role;
            $newRole->salary = $request->salary;
            $newRole->save();
            $employee->role_id = $newRole->id;
            $employee->save();
            $this->saveHistory($request, $employee->id, $newRole->id);
        } elseif ($role->salary != $request->salary) {
            $role->salary = $request->salary;
            $role->save();
            $this->saveHistory($request, $employee->id, $role->id);
        }

        $employee = Employee::find($employee->id);
        $employee->name = $request->name;
        $employee->lastname = $request->lastname;
        $employee->save();

        return view('employee.update', compact('employee', 'role'));
    }

    public function saveHistory(Request $request, $employee_id, $role_id) {
        $salaryInrement = new SalaryIncrement();
        $salaryInrement->employee_id = $employee_id;
        $salaryInrement->role_id = $role_id;
        $salaryInrement->salary_increases = $request->salary;
        $salaryInrement->save();   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee)
    {
        $employee = Employee::find($employee->id);
        $employee->delete();
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }
}
