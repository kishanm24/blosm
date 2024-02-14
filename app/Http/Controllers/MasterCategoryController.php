<?php

namespace App\Http\Controllers;

use App\Models\MasterCategory;
use Illuminate\Http\Request;

class MasterCategoryController extends Controller
{
    public function create()
    {
        return view('admin.master_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:master_categories',
        ]);

        MasterCategory::create($request->only('name'));

        return redirect()->route('master-category.index')->with('success', 'Master category created successfully.');
    }

    public function index(Request $request)
    {
        try {

            $master_category = MasterCategory::filter($request->all())->paginate(10);

            return view('admin.master_categories.index', [
                'vendors' => $master_category
            ]);

        } catch (Exception $e) {
            toastr()->error('Oops! Something went wrong!');
            return back()->with('error',"something went wrong");
        }
    }
}