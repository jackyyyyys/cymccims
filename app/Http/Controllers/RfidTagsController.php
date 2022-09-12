<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RfidTag;
use App\Item;

class RfidTagsController extends Controller
{
    //
    public function create()
    {
        // NOT ALLOWED
        return \Redirect::route('rfidTags.index');
    }

    public function store(Request $request)
    {
        // NOT ALLOWED
        return \Redirect::route('rfidTags.index');
    }

    public function show($id)
    {
        // NOT ALLOWED
        return \Redirect::route('rfidTags.index');
    }

    public function index()
    {
        $tags = RfidTag::all();
        return view('rfidTags.index', compact('tags'));
    }

    public function edit($id)
    {
        // NOT ALLOWED
        return \Redirect::route('rfidTags.index');
    }

    public function update(Request $request, $id)
    {
        // NOT ALLOWED
        return \Redirect::route('rfidTags.index');
    }

    public function destroy($id)
    {
        // NOT ALLOWED
        return \Redirect::route('rfidTags.index');
    }
}
