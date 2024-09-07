<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $department = Department::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->get();
        return Inertia::render('DepartmentList', [
            'departments' =>  $department,
        ]);
    }

    public function create()
    {
        return Inertia::render('DepartmentForm');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Department::create($request->all());
        return Inertia::render('DepartmentList', [
            'departments' => Department::all(),
        ]);
    }
        public function edit(Department $department)
    {
        return Inertia::render('DepartmentForm', ["department" => $department]);
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $department->update($request->all());
        return Inertia::render('DepartmentList', [
            'departments' => Department::all(),
        ]);
    }
    public function destroy(Department $department)
    {
        $department->delete();
        return Inertia::render('DepartmentList', [
            'departments' => Department::all(),
        ]);
    }

}
