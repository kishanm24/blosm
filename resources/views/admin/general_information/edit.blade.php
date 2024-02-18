@extends('layouts.master')

@section('title') @lang('translation.create-general-information') @endsection

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="live-preview">
                    <!-- {!! Form::open(['route' => 'general-information.store', 'method' => 'post']) !!} -->
                    {!! Form::model($general_information, ['route' => ['general-information.update', $general_information->id], 'method' => 'PUT','enctype' => 'multipart/form-data', 'files' => true, 'class' => 'form-design']) !!}

                    <div class="row">
                        <div class="col-md-6 mb-6">
                            <div>
                                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                                {!! Form::text('name', $general_information->Name, ['class' => 'form-control', 'required',"placeholder" => "Name","readonly"]) !!}
                            </div>

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-6">
                           <!-- <div id="editor"></div> -->
                            <div>
                                {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
                                {!! Form::text('description', $general_information->description, ['class' => 'form-control', 'required']) !!}   
                            </div>
                        </div>
                    </div>

                    <div class="text-start mt-3 mb-3">
                        {!! Form::submit('Update', ['class' => 'btn btn-success w-sm', 'id' => "Update"]); !!}
                    </div>


                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
