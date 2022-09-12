<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zone;
use App\Theatre;
use App\RfidReader;

class RfidReadersController extends Controller
{
    //
    public function create()
    {
        $zones = Zone::pluck('name', 'id');

        return view('rfidReaders.create', compact('zones'));
    }

    public function store(Request $request)
    {
        $zone = Zone::find($request->get('zone+id'));
        $reader = new RfidReader;
        $reader->name = $request->get('name');
        $reader->zone()->associate($zone);
        $reader->save();
        return \Redirect::route('rfidReaders.index');
    }

    public function show($id)
    {
        // NOT ALLOWED
        return \Redirect::route('rfidReaders.index');
    }

    public function index()
    {
        $rfidReaders = RfidReader::all();
        return view('rfidReaders.index', compact('rfidReaders'));
    }

    public function edit($id)
    {
        $rfidReader = RfidReader::find($id);
        $zones = Zone::pluck('name', 'id');
        return view('rfidReaders.edit', compact('rfidReader', 'zones'));
    }

    public function update(Request $request, $id)
    {
        $reader = RfidReader::find($id);
        $reader->update($request->all());
        return \Redirect::route('rfidReaders.index');
    }

    public function destroy($id)
    {
        $reader = RfidReader::find($id);
        $reader->delete();
        return \Redirect::route('rfidReaders.index');
    }
}
