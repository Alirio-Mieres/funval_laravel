<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = new Employee();
        return $employee->all(); 
    }

    public function create(Request $request)
    {
        $employee = new Employee();
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->address = $request->address;
        $employee->email = $request->email;
        $employee->role = $request->role;
        $employee->password = $request->password;
        $employee->save();
        return $employee;
    }

    public function show($id)
    {
        $employee = new Employee();
        return $employee->find($id);
    }

    public function update($id, Request $request)
    {
        $employee = Employee::find($id);
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->address = $request->address;
        $employee->email = $request->email;
        $employee->role = $request->role;
        $employee->password = $request->password;
        $employee->save();
        return $employee;
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return $employee;
    }
}
