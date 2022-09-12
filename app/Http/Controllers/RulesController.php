<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Zone;
use App\Rule;

class RulesController extends Controller
{
    //
    public function create()
    {
        $items = Item::pluck('description', 'id');
        $zones = Zone::pluck('name', 'id');
        return view('rules.create', compact('zones', 'items'));
    }

    public function store(Request $request)
    {
        $item = Item::find($request->get('item_id'));
        $zone = Zone::find($request->get('zone_id'));
        $rule = new Rule;
        $rule->item()->associate($item);
        $rule->zone()->associate($zone);
        $rule->save();

        return \Redirect::route('rules.index');
    }

    public function show($id)
    {
        // NOT ALLOWED
        return \Redirect::route('rules.index');
    }

    public function index()
    {
        $rules = Rule::orderBy('item_id', 'ASC')->get();
        $violate['any'] = false;
        foreach ($rules as $rule)
        {
            $violate[$rule->id] = false;
            if ($rule->zone->id == $rule->item->latest_zone_id)
            {
                $violate[$rule->id] = true;
                $violate['any'] = true;
            }
        }
        return view('rules.index', compact('rules', 'violate'));
    }

    public function edit($id)
    {
        $rule = Rule::find($id);
        $items = Item::pluck('description', 'id');
        $zones = Zone::pluck('name', 'id');
        return view('rules.edit', compact('rule', 'zones', 'items'));
    }

    public function update(Request $request, $id)
    {
        $rule = Rule::find($id);
        $rule->update($request->all());
        return \Redirect::route('rules.index');
    }

    public function destroy($id)
    {
        $rule = Rule::find($id);
        $rule->delete();
        return \Redirect::route('rules.index');
    }
}

