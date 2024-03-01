@extends('layouts.master')

@section('title') @lang('translation.create-master-category') @endsection

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="live-preview">
                    {!! Form::open(['route' => 'master-category.store', 'method' => 'post']) !!}
                    {{-- {!! Form::model($master_category, ['route' => route('master-category.update',['master_category' => $master_category->id]),'method' => 'PUT','enctype' => 'multipart/form-data', 'files' => true, 'class' => 'form-design']) !!} --}}
                    {{-- {!! Form::model($master_category, ['route' => ['master-category.update', $master_category->id], 'method' => 'PUT','enctype' => 'multipart/form-data', 'files' => true, 'class' => 'form-design']) !!} --}}

                    <div class="row">
                        <div class="col-md-6 mb-6">
                            <div>
                                {!! Form::label('name', 'Category Name', ['class' => 'form-label']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required',"placeholder" => "Product category Name"]) !!}
                            </div>

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="text-start mt-3 mb-3">
                        {!! Form::submit('Create', ['class' => 'btn btn-success w-sm', 'id' => "submit"]); !!}
                    </div>


                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
