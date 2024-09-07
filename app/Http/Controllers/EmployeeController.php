<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

            $employees = Employee::with('serviceRecords.department')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->get();
        // return Inertia::render('EmployeeList', [
        //     'employees' => Employee::with('serviceRecords.department')->get(),
        // ]);
          return Inertia::render('EmployeeList', [
            'employees' => $employees,
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

        public function destroy(Employee $employee)
    {
        $employee->delete();
        return Inertia::render('EmployeeList', [
            'employees' => Employee::all(),
        ]);
    }


}

