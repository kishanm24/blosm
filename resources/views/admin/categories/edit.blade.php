@extends('layouts.master')

@section('title') @lang('translation.create-category') @endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="live-preview">
                
                {!! Form::model($category, ['route' => ['category.update', $category->id], 'method' => 'PUT','enctype' => 'multipart/form-data', 'files' => true, 'class' => 'form-design']) !!}

                    <div class="row">

                        <div class="col-md-6 mb-4">
                            <div>
                                {!! Form::label('master_category', 'Select Master Category', ['class' => 'form-label']) !!}

                                {!! Form::select('master_category', $master_category, $category->master_category->id, ['placeholder' => 'Select Master Category','class' => 'form-select', 'id' => 'vehicle','required']) !!}
                            </div>

                            @error('master_category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <div>
                                {!! Form::label('name', 'Category Name', ['class' => 'form-label']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required',"placeholder" => "Product category Name"]) !!}
                            </div>

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <div>

                                <div>
                                    {!! Form::label('attribute', 'Select Attribute', ['class' => 'form-label']) !!}

                                    {!! Form::select('attribute[]', $attribute, $category_attribute, ['class' => ' js-example-basic-multiple', 'id' => 'vehicle','required','multiple'=>"multiple"]) !!}
                                </div>

                            </div>


                            @error('attribute')
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

@section('script')

<!--jquery cdn-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--select2 cdn-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>

<script>
    // $('.js-example-basic-multiple').select2()
</script>

@endsection
