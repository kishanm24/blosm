<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\MasterCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{

    public function index(Request $request)
    {
        try {

            $category = Category::with('attributes')->where('is_main',true)->filter($request->all())->paginate(10);

            return view('admin.categories.index', [
                'category' => $category
            ]);

        } catch (Exception $e) {
            toastr()->error('Oops! Something went wrong!');
            return back()->with('error',"something went wrong");
        }
    }

    public function create()
    {
        $master_category = MasterCategory::pluck('name','id');

        $attribute = Attribute::pluck('name','id');

        return view('admin.categories.create',['master_category' => $master_category,'attribute' => $attribute]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'master_category' => 'required|exists:master_categories,id',
            'name' => 'required|string|max:255|unique:categories,name',
            'attribute' => 'array|required',
            'attribute.*' => 'numeric|distinct',
        ]);

        $slug = Str::slug($request->name);

        $category =  Category::create([
            'name' => $request->name,
            'master_category_id' => $request->master_category,
            'is_main' => true,
            'slug' => $slug
        ]);

        $category->attributes()->attach($request->attribute);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }


}
