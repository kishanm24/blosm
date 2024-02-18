<?php

namespace App\Http\Controllers;

use App\Models\GeneralInformation;
use Illuminate\Http\Request;


class GeneralInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $general_info = GeneralInformation::filter($request->all())->paginate(10);

            return view('admin.general_information.index', [
                'general_info' => $general_info
            ]);

        } catch (Exception $e) {
            toastr()->error('Oops! Something went wrong!');
            return back()->with('error',"something went wrong");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.general_information.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:general_information',
        ]);

        GeneralInformation::create([ 'name' => $request->name,
        'description' => $request->description,]);

        return redirect()->route('general-information.index')->with('success', 'General Information created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {

            $general_information = GeneralInformation::findOrFail($id);


            return view('admin.general_information.edit', compact('general_information'));
          
            // return view('Frontend.Family.view',compact('vendors'));


        } catch (Exception $e) {
            toastr()->error('Oops! Something went wrong!');
            return back()->with('error',"something went wrong");
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
              
            GeneralInformation::where('id',$id)->update([
            'description' => $request->description,
        ]);
      
        return redirect()->route('general-information.index')->with('success', 'General Information updated successfully.');

        } catch (Exception $e) {
            toastr()->error('Oops! Something went wrong!');
            return back()->with('error',"something went wrong");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        $general_info = GeneralInformation::find($id);

        $general_info->delete();

        return redirect()->route('general-information.index')->with('success', 'General Information deleted successfully.');
    }
}
