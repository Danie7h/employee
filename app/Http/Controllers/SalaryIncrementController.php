<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalaryIncrement;
use Illuminate\Support\Facades\DB;

class SalaryIncrementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaryIncrements = SalaryIncrement::join('employees', 'employees.id', '=', 'salary_increments.employee_id')
            ->join('roles', 'roles.id', '=', 'salary_increments.role_id')
            ->get('*', 'salary_increment.id as id');
        return view('salary.history', compact('salaryIncrements'));
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
     * @param  \App\Models\SalaryIncrement  $salaryIncrement
     * @return \Illuminate\Http\Response
     */
    public function show(SalaryIncrement $salaryIncrement, $id)
    {
        $salaryIncrements = SalaryIncrement::join('employees', 'employees.id', '=', 'salary_increments.employee_id')
            ->join('roles', 'roles.id', '=', 'salary_increments.role_id')
            ->where('salary_increments.employee_id', '=', $id)
            ->get();
        return view('salary.history', compact('salaryIncrements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalaryIncrement  $salaryIncrement
     * @return \Illuminate\Http\Response
     */
    public function edit(SalaryIncrement $salaryIncrement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalaryIncrement  $salaryIncrement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalaryIncrement $salaryIncrement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalaryIncrement  $salaryIncrement
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalaryIncrement $salaryIncrement)
    {
        //
    }
}
