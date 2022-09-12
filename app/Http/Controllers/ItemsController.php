<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\ItemCategory;
use App\Department;
use App\Zone;
use App\Rule;
use App\RfidTag;
use App\Register;

class ItemsController extends Controller
{
    //
    public function create()
    {
        $categories = ItemCategory::pluck('description','id');
        $zones = Zone::all();
        $departments = Department::pluck('description','id');

        foreach ($zones as $zone)
        {
            if ($zone->theatre)
            {
                $longName[$zone->id] = $zone->theatre->description . ": ". $zone->description;
            }
            else
            {
                $longName[$zone->id] = $zone->description;
            }
        }

        return view('items.create', compact('longName', 'categories', 'zones', 'departments'));
    }

    public function store(Request $request)
    {
        $category = ItemCategory::find($request->get('category_id'));
        $department = Department::find($request->get('department_id'));
        $zone = Zone::find($request->get('store_zone_id'));

        $newrules = $request->get('zone');

        $item = new Item;

        $item->name = $request->get('name');
        $item->description = $request->get('description');
        $item->brand = $request->get('brand');
        $item->model = $request->get('model');
        $item->category()->associate($category);
        $item->department()->associate($department);
        $item->store_zone()->associate($zone);
        $item->latest_zone()->associate($zone);

        $item->save();

        $tag = new RfidTag;
        $tag->name = $request->get('rfid_tag_name');
        $tag->item()->associate($item);

        $tag->save();

        foreach ($newrules as $newrule)
        {
            $rule = new Rule;
            $rule_zone = Zone::find($newrule);
            $rule->zone()->associate($rule_zone);
            $rule->item()->associate($item);
            $rule->save();
        }

        return \Redirect::route('items.show', array($item->id));
    }

    public function show($id)
    {
        $item = Item::find($id);
        $tag = RfidTag::where('item_id', $item->id)->first();
        $rules = Rule::where('item_id', $item->id)->get();
        $registers = Register::where('rfid_tag_id', $tag->id)->get();
        foreach ($rules as $rule)
        {
            $violations[$rule->id] = FALSE;
            $item = Item::find($rule->item_id);
            $zone = Zone::find($rule->zone_id);
            if ($zone->id == $item->latest_zone_id)
            {
                $violations[$rule->id] = true;
            }
        }
        $unchanged = FALSE;

        return view('items.show', compact('violations', 'rules', 'unchanged', 'item', 'tag', 'registers'));
    }

    public function index()
    {
        $items = Item::all();
        $rules = Rule::all();
        foreach ($items as $item)
        {
            $item->tag = RfidTag::where('item_id', $item->id)->first();
        }
        foreach ($rules as $rule)
        {
            $violations[$rule->id] = FALSE;
            $item = Item::find($rule->item_id);
            $zone = Zone::find($rule->zone_id);
            if ($zone->id == $item->latest_zone_id)
            {
                $violations[$rule->id] = true;
            }
        }

        return view('items.index', compact('items', 'rules', 'violations'));
    }

    public function edit($id)
    {
        $item = Item::find($id);
        $tag = RfidTag::where('item_id', $item->id)->first();
        $rules = Rule::where('item_id', $item->id)->get();

        foreach($rules as $rule)
        {
            $current_rule[$rule->id] = $rule->zone->id;
        }

        $categories = ItemCategory::pluck('description','id');
        $zones = Zone::all();
        $departments = Department::pluck('description','id');

        foreach ($zones as $zone)
        {
            if ($zone->theatre)
            {
                $longName[$zone->id] = $zone->theatre->description . ": ". $zone->description;
            }
            else
            {
                $longName[$zone->id] = $zone->description;
            }
        }

        $unchanged = FALSE;

        return view('items.edit', compact('current_rule', 'longName', 'item', 'tag', 'categories', 'zones', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        $tag = RfidTag::where('item_id', $item->id)->first();
        $newrules = $request->get('zone');

        if ($request->get('rfid_tag_name') !== $tag->name)
        {
            $tags = RfidTag::all();
            $exist = FALSE;
            $unchanged = FALSE;
            foreach ($tags as $temptag)
            {
                // Except the current tag
                if ($tag->name !== $temptag->name)
                {
                    // Exist in DB
                    if ($request->get('rfid_tag_name') == $temptag->name)
                    {
                        $exist = TRUE;
                        // if the tag is associated to other item
                        if ($temptag->item_id)
                        {
                            $unchanged = TRUE;
                            return view('items.show', compact('unchanged', 'item', 'tag'));
                        }
                        // chosen tag is available
                        else
                        {
                            // disconnect current tag
                            $tag->item_id = NULL;
                            $tag->save();

                            // change target tag
                            $temptag->item()->associate($item);
                            $temptag->save();

                            $exist = TRUE;
                            break;
                        }
                    }
                }
            }
            // NEW RFID Tag
            if ($exist == FALSE) {
                $tag->item_id = NULL;
                $tag->save();

                $new_tag = new RfidTag;
                $new_tag->name = $request->get('rfid_tag_name');
                $new_tag->item()->associate($item);
                $new_tag->save();
            }
        }

        $rules = Rule::where('item_id', $item->id)->get();
        foreach($rules as $rule)
        {
            $rule->delete();
        }

        foreach ($newrules as $newrule)
        {
            $rule = new Rule;
            $rule_zone = Zone::find($newrule);
            $rule->zone()->associate($rule_zone);
            $rule->item()->associate($item);
            $rule->save();
        }

        $item->update($request->all());

        return \Redirect::route('items.show', array($item->id));
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        $tag = RfidTag::where('item_id', $item->id)->first();

        $tag->item_id = NULL;
        $tag->save();
        $item->delete();

        $items = Item::all();
        foreach ($items as $item)
        {
            $item->tag = RfidTag::where('item_id', $item->id)->first();
        }

        $rules = Rule::where('item_id', $item->id)->get();
        foreach($rules as $rule)
        {
            $rule->delete();
        }

        return \Redirect::route('items.index', compact('items'));
    }
}
