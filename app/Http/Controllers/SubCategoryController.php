<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
        try {

            $sub_category = Category::where('is_main',false)->filter($request->all())->paginate(10);

            return view('admin.sub_categories.index', [
                'sub_category' => $sub_category
            ]);

        } catch (Exception $e) {
            toastr()->error('Oops! Something went wrong!');
            return back()->with('error',"something went wrong");
        }
    }

    public function create()
    {
        $category = Category::where('is_main', true)->pluck('name','id');

        return view('admin.sub_categories.create',['category' => $category]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'category' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        $slug = Str::slug($request->name);

        Category::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'is_main' => false,
            'slug' => $slug
        ]);

        return redirect()->route('sub-category.index')->with('success', 'Sub Category created successfully.');
    }
}
