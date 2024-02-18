@extends('layouts.master')

@section('title') @lang('translation.create-general-information') @endsection
@section('css')
<link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="live-preview">
                    {!! Form::open(['route' => 'general-information.store', 'method' => 'post']) !!}

                    <div class="row">
                        <div class="col-md-6 mb-6">
                            <div>
                                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required',"placeholder" => "Name"]) !!}
                            </div>

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-6">
                           <!-- <div id="editor"></div> -->
                            <div>
                                {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
                                {!! Form::text('description', "", ['class' => 'form-control', 'required']) !!}   
                            </div>
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
@section('script')
<script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

