<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'desc')->get();
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'last_name'  => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'email'      => 'required|email|unique:employees,email',
        'phone'      => 'nullable|string|max:20',
        'birth_date' => 'nullable|date',
        'birth_place'=> 'nullable|string|max:255',
        'position'   => 'required|string',
        'specialty'  => 'nullable|string|max:255',
        'photo'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'cv'         => 'nullable|mimes:pdf,doc,docx|max:5120',
    ]);

    $employee = new Employee($request->all());

    // رفع الصور و CV كما هو
    if ($request->hasFile('photo')) {
        $photoName = time().'_'.$request->photo->getClientOriginalName();
        $request->photo->move(public_path('uploads/photos'), $photoName);
        $employee->photo = $photoName;
    }

    if ($request->hasFile('cv')) {
        $cvName = time().'_'.$request->cv->getClientOriginalName();
        $request->cv->move(public_path('uploads/cv'), $cvName);
        $employee->cv = $cvName;
    }

    $employee->save();

    return redirect()->route('employees.index')->with('success', 'Employé ajouté avec succès !');
}

    public function edit(Employee $employee)
    {
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
{
    $request->validate([
        'last_name'  => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'email'      => 'required|email|unique:employees,email,' . $employee->id,
        'phone'      => 'nullable|string|max:20',
        'birth_date' => 'nullable|date',
        'birth_place'=> 'nullable|string|max:255',
        'position'   => 'required|string',
        'specialty'  => 'nullable|string|max:255',
        'photo'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'cv'         => 'nullable|mimes:pdf,doc,docx|max:5120',
    ]);

    $employee->fill($request->all());

    if ($request->hasFile('photo')) {
        if ($employee->photo) Storage::disk('public')->delete($employee->photo);
        $photoName = time().'_'.$request->photo->getClientOriginalName();
        $request->photo->move(public_path('uploads/photos'), $photoName);
        $employee->photo = $photoName;
    }

    if ($request->hasFile('cv')) {
        if ($employee->cv) Storage::disk('public')->delete($employee->cv);
        $cvName = time().'_'.$request->cv->getClientOriginalName();
        $request->cv->move(public_path('uploads/cv'), $cvName);
        $employee->cv = $cvName;
    }

    $employee->save();

    return redirect()->route('employees.index')->with('success', 'Employé mis à jour avec succès !');
}
    public function destroy(Employee $employee)
    {
        if ($employee->photo) Storage::disk('public')->delete($employee->photo);
        if ($employee->cv) Storage::disk('public')->delete($employee->cv);

        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employé supprimé.');
    }
}
