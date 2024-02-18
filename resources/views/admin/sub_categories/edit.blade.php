@extends('layouts.master')

@section('title') @lang('translation.create-sub-category') @endsection

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="live-preview">
                {!! Form::model($category, ['route' => ['sub-category.update', $sub_category->id], 'method' => 'PUT','enctype' => 'multipart/form-data', 'files' => true, 'class' => 'form-design']) !!}
                    <div class="row">

                        <div class="col-md-6 mb-4">
                            <div>
                                {!! Form::label('category', 'Select Category', ['class' => 'form-label']) !!}

                                {!! Form::select('category', $category, $sub_category->category_id, ['placeholder' => 'Select Category','class' => 'form-select', 'id' => 'vehicle','required']) !!}
                            </div>

                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <div>
                                {!! Form::label('name', 'Sub Category Name', ['class' => 'form-label']) !!}
                                {!! Form::text('name', $sub_category->name, ['class' => 'form-control', 'required',"placeholder" => "Sub Category Name"]) !!}
                            </div>

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>



                    <div class="text-start mb-3">
                        {!! Form::submit('Update', ['class' => 'btn btn-success w-sm', 'id' => "submit"]); !!}
                    </div>


                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
