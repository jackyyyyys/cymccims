<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Zone;
use App\ItemCategory;
use App\Department;
use App\Theatre;
use App\Rule;
use App\RfidTag;
use App\RfidReader;
use App\Register;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function admin() {
        $departments = Department::all();
        $theatres = Theatre::all();
        $categories = ItemCategory::all();
        $rfidReaders = RfidReader::all();
        $tags = RfidTag::all();

        return view('admin.index', compact(
            'departments',
            'theatres',
            'categories',
            'rfidReaders',
            'tags'
        ));
    }

    public function ack()
    {
        return view('ack');
    }

    public function loadSimulator()
    {
        $items = Item::all();
        $items_select = Item::pluck('description', 'id');
        $readers = RfidReader::all();
        $readers_select = RfidReader::pluck('name', 'id');
        $register = Register::orderBy('created_at', "DSC")->first();
        if (Carbon::now()->diffInMinutes($register->created_at) <= 1)
        {
            $message = ('item '. $register->rfidTag->item->id . ' registered at reader ' . $register->rfidReader->zone->id);
        }  else $message = NULL;

        return view('simulator', compact('message', 'items', 'items_select', 'readers', 'readers_select'));
    }

    // !!! CANT FIND CONTROLLER
    public function callFromSimulator(Request $request)
    {
        $item = Item::find($request->get('item'));
        $reader = RfidReader::find($request->get('reader'));
        $zone = Zone::where('id', $reader->zone_id)->first();
        $tag = RfidTag::where('item_id', $item->id)->first();

        $register = new Register;

        $register->rfidTag()->associate($tag);
        $register->rfidReader()->associate($reader);
        $register->save();

        $item->latest_zone()->associate($zone);
        $item->save();

        return \Redirect::route('simulator');
    }

}
