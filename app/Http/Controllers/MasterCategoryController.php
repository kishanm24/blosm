<?php

namespace App\Http\Controllers;

use App\Models\MasterCategory;
use Illuminate\Http\Request;

class MasterCategoryController extends Controller
{
    public function create()
    {
        $master_category = MasterCategory::find(1);

        return view('admin.master_categories.create',['master_category' =>$master_category]);
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

    public function edit($id)
    {
        try {

            $master_category = MasterCategory::findOrFail($id);


            return view('admin.master_categories.edit', compact('master_category'));
          
            // return view('Frontend.Family.view',compact('vendors'));


        } catch (Exception $e) {
            toastr()->error('Oops! Something went wrong!');
            return back()->with('error',"something went wrong");
        }

    }

    public function update(Request $request, $id)
    {
        try {
            
            $request->validate([
                'name' => 'required|string|max:255|unique:master_categories',
            ]);
            MasterCategory::where('id',$id)->update([
            'name' => $request->name,
        ]);
      
        return redirect()->route('master-category.index')->with('success', 'Master category created successfully.');

        } catch (Exception $e) {
            toastr()->error('Oops! Something went wrong!');
            return back()->with('error',"something went wrong");
        }
    }
}
