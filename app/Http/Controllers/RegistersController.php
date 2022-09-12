<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Item;
use App\Zone;
use App\RfidTag;
use App\RfidReader;
use App\Register;

class RegistersController extends Controller
{
    //
    public function create()
    {
        // NOT ALLOWED
        return \Redirect::route('registers.index');
    }

    public function store(Request $request)
    {
        $tag = RfidTag::where('name', $request->get('tag'))->first();
        $reader = RfidReader::where('id', $request->get('reader'))->first();

        $item = Item::where('id', $tag->item_id)->first();
        $zone = Zone::where('id', $reader->zone_id)->first();

        $register = new Register;

        $register->rfidTag()->associate($tag);
        $register->rfidReader()->associate($reader);
        $register->save();

        $item->latest_zone()->associate($zone);
        $item->save();

        return response(
            ('item '. $item->id . ' registered at zone ' . $zone->id),
            200
        );
        // return \Redirect::route('registers.index');
    }

    public function show($id)
    {
        // NOT ALLOWED
        return \Redirect::route('registers.index');
    }

    public function index()
    {
        $registers = Register::orderBy('created_at', 'DSC')->get();
        return view('registers.index', compact('registers'));
    }

    public function edit(Request $request, $id)
    {
        // NOT ALLOWED
        return \Redirect::route('registers.index');
    }

    public function update($id)
    {
        // NOT ALLOWED
        return \Redirect::route('registers.index');
    }

    public function delete($id)
    {
        $register = Register::find($id);
        $register->delete();
        return \Redirect::route('registers.index');
    }
}
