<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\MasterCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryApiController extends Controller
{
    public function getMasterCategory()
    {
        $masterCategory = MasterCategory::select('id','name')->get();

        return $this->response(200,$masterCategory,"Master Category Fetch successfully");
    }

    public function getCategory()
    {
        $category = Category::where('is_main',true)->get();

        return $this->response(200,$category,"Category Fetch successfully");
    }

    public function getSubCategory(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return $this->response(400,['errors' => $validator->errors()],"Validation Error");
        }

        $subCategory = Category::where('category_id',$request->category_id)->where('is_main',false)->get();

        return $this->response(200,$subCategory,"Sub Category Fetch successfully");
    }

}
