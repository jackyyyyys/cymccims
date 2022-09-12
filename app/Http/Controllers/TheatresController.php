<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theatre;

class TheatresController extends Controller
{
    //
    public function create()
    {
        return view('theatres.create');
    }

    public function store(Request $request)
    {
        $theatre = new Theatre;
        $theatre->name = $request->get('name');
        $theatre->description = $request->get('description');
        $theatre->save();
        return \Redirect::route('theatres.index');
    }

    public function show($id)
    {
        return \Redirect::route('theatres.index');
    }

    public function index()
    {
        $theatres = Theatre::all();
        return view('theatres.index', compact('theatres'));
    }

    public function edit($id)
    {
        $theatre = Theatre::find($id);
        return view('theatres.edit', compact('theatre'));
    }

    public function update(Request $request, $id)
    {
        $theatre = Theatre::find($id);
        $theatre->update($request->all());
        return \Redirect::route('theatres.index');
    }

    public function destroy($id)
    {
        $theatre = Theatre::find($id);
        $theatre->delete();
        return \Redirect::route('theatres.index');
    }

}
