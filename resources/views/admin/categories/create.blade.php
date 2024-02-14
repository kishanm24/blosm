@extends('layouts.master')

@section('title') @lang('translation.create-category') @endsection

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="live-preview">
                    {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}

                    <div class="row">

                        <div class="col-md-6 mb-4">
                            <div>
                                {!! Form::label('master_category', 'Select Master Category', ['class' => 'form-label']) !!}

                                {!! Form::select('master_category', $master_category, null, ['placeholder' => 'Select Master Category','class' => 'form-select', 'id' => 'vehicle','required']) !!}
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

                    </div>



                    <div class="text-start mb-3">
                        {!! Form::submit('Create', ['class' => 'btn btn-success w-sm', 'id' => "submit"]); !!}
                    </div>


                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
