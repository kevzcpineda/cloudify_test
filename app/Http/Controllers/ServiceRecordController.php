<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\ServiceRecord;

class ServiceRecordController extends Controller
{
    public function index()
    {
        return Inertia::render('ServiceRecordList',['serviceRecords' => ServiceRecord::all(),]);
    }

    public function create()
    {
        return Inertia::render('ServiceRecordForm');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'salary' => 'required|string|max:255',
        ]);

        ServiceRecord::create($request->all());
        return Inertia::render('ServiceRecordList', [
            'serviceRecords' => ServiceRecord::all(),
        ]);
    }
    public function edit(ServiceRecord $serviceRecord)
    {
        return Inertia::render('ServiceRecordForm', ["serviceRecord" => $serviceRecord]);
    }

        public function update(Request $request, ServiceRecord $serviceRecord)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'salary' => 'required|string|max:255',
        ]);

        $serviceRecord->update($request->all());
        return Inertia::render('ServiceRecordList', [
            'serviceRecord' => ServiceRecord::all(),
        ]);
    }
    public function destroy(ServiceRecord $serviceRecord)
    {
        $serviceRecord->delete();
        return Inertia::render('ServiceRecordList', [
            'serviceRecords' => ServiceRecord::all(),
        ]);
    }

}
