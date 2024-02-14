<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\MasterCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AttributeController extends Controller
{

    public function index(Request $request)
    {
        try {

            $attribute = Attribute::filter($request->all())->paginate(10);

            return view('admin.attribute.index', [
                'attribute' => $attribute
            ]);

        } catch (Exception $e) {
            toastr()->error('Oops! Something went wrong!');
            return back()->with('error',"something went wrong");
        }
    }

    public function create()
    {
        $type = ['select' => 'select','color' => 'color'];

        return view('admin.attribute.create',['type' => $type]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'type' => 'required',
            'name' => 'required|string|max:255|unique:attributes,name',
        ]);


        $attribute = Attribute::create([
            'name' => $request->name,
            'type' => $request->type,

        ]);

        $attributeValues = [];
        foreach ($request->value as $value) {
            $attributeValues[] = ['value' => $value];
        }

        // Associate multiple attribute values with the attribute in a single hit
        $attribute->attributeValues()->createMany($attributeValues);

        return redirect()->route('attribute.index')->with('success', 'Attribute created successfully.');
    }


}
