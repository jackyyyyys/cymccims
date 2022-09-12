<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Zone;
use App\Item;
use App\Register;
use App\RfidTag;
use App\RfidReader;
use App\Theatre;
use App\Rule;
use Carbon\Carbon;

class ZonesController extends Controller
{
    //
    public function create()
    {
        $theatres = Theatre::pluck('description', 'id');
        return view('zones.create', compact('theatres'));
    }

    public function store(Request $request)
    {
        $theatre = Theatre::where('id', $request->theatre_id)->first();
        $zone = new Zone;
        $zone->name = $request->get('name');
        $zone->description = $request->get('description');
        $zone->theatre()->associate($theatre);
        $zone->save();

        return \Redirect::route('zones.show', array($zone->id));
    }

    public function show($id)
    {
        $zone = Zone::find($id);
        $readers = RfidReader::where('zone_id', $id)->get();
        $items = Item::where('store_zone_id', $id)->get();
        $rules = Rule::where('zone_id', $id)->get();

        return view('zones.show', compact('zone', 'readers', 'items', 'rules'));
    }

    public function index()
    {
        $zones = Zone::orderBy('theatre_id', 'DSC')->get();
        $items = Item::all();
        foreach ($items as $item)
        {
            $item['violated'] = FALSE;
            $rules = Rule::where('item_id',$item->id)->get();
            foreach ($rules as $rule)
            {
                if ($rule->zone->id == $item->latest_zone_id)
                {
                    $item['violated'] = true;
                }
            }
        }
        $now = Carbon::now();
        $registers = Register::orderBy('created_at', 'DSC')->take(10)->get();
        $rules = Rule::all();
        $violations['any']=false;

        return view('zones.index', compact( 'zones', 'items', 'now', 'registers'));
    }

    public function edit($id)
    {
        $zone = Zone::find($id);
        return view('zones.edit', compact('zone', 'items'));
    }

    public function update(Request $request, $id)
    {
        $zone = Zone::find($id);
        $zone->update($request->all());
        return \Redirect::route('zones.show', array($zone->id));
    }

    public function destroy($id)
    {
        $zone = Zone::find($id);
        $zone->delete();
        return \Redirect::route('zones.index');
    }

}


