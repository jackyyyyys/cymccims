<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemCategory;

class ItemCategoriesController extends Controller
{
    //
    public function create()
    {
        return view('itemCategories.create');
    }

    public function store(Request $request)
    {
        $category = new ItemCategory;
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->save();
        return \Redirect::route('itemCategories.index');
    }

    public function show($id)
    {
        return \Redirect::route('itemCategories.index');
    }

    public function index()
    {
        $categories = ItemCategory::all();
        return view('itemCategories.index', compact('categories'));
    }

    public function edit($id)
    {
        $category = ItemCategory::find($id);
        return view('itemCategories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = ItemCategory::find($id);
        $category->update($request->all());
        return \Redirect::route('itemCategories.index');
    }

    public function destroy($di)
    {
        $category = ItemCategory::find($id);
        $category->delete();
        return \Redirect::route('itemCategories.index');
    }

}
