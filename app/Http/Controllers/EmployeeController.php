<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        return Inertia::render('EmployeeList', [
            'employees' => Employee::all(),
        ]);
    }

    public function create()
    {
        return Inertia::render('EmployeeForm');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
        ]);

        Employee::create($request->all());
        return Inertia::render('EmployeeList', [
            'employees' => Employee::all(),
        ]);
    }


    public function edit(Employee $employee)
    {
        return Inertia::render('EmployeeForm', ["employee" => $employee]);
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
        ]);

        $employee->update($request->all());
        return Inertia::render('EmployeeList', [
            'employees' => Employee::all(),
        ]);
    }

}

