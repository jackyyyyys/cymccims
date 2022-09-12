<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentsController extends Controller
{
    //
    public function create()
    {
        // NOT ALLOWED
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $department = new Department;
        $department->name = $request->get('name');
        $department->description = $request->get('description');
        $department->save();
        return \Redirect::route('departments.index');
    }

    public function show($id)
    {
        // NOT ALLOWED
        return \Redirect::route('departments.index');
    }

    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function edit($id)
    {
        $department = Department::find($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $department->update($request->all());
        return \Redirect::route('departments.index');
    }

    public function destroy($di)
    {
        $department = Department::find($id);
        $department->delete();
        return \Redirect::route('departments.index');
    }

}
