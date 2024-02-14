@extends('layouts.master')

@section('title') @lang('translation.create-category') @endsection

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="live-preview">
                    {!! Form::open(['route' => 'attribute.store', 'method' => 'post']) !!}

                    <div class="row">


                        <div class="col-md-6 mb-4">
                            <div>
                                {!! Form::label('name', 'Attribute Name', ['class' => 'form-label']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required',"placeholder" => "Product Attribute Name"]) !!}
                            </div>

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <div>
                                {!! Form::label('tyep', 'Select Attribute Type', ['class' => 'form-label']) !!}

                                {!! Form::select('type', $type, null, ['placeholder' => 'Select Attribue Type','class' => 'form-select', 'id' => 'vehicle','required']) !!}
                            </div>

                            @error('type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="row">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="font-size-18 text-dark mb-4">Attribute Values:</h4>
                        </div>
                    </div>

                    <div class="row" id="attributeValuesContainer">

                        <div class="add_attribute_value row">


                            <div class="col-md-6 mb-4">
                                <div>
                                    {!! Form::text('value[]', null, ['class' => 'form-control', 'required',"placeholder" => "Ex: S"]) !!}
                                </div>

                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <button type="button" class="btn btn-soft-primary waves-effect waves-light material-shadow-none add-row"><i class="ri-add-line"></i></button>
                                <button type="button" class="btn btn-soft-danger btn-icon waves-effect material-shadow-none waves-light remove-row"><i class="ri-delete-bin-5-line"></i></button>
                            </div>
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

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script>
     $(document).ready(function() {
     // Add new row
     $('#attributeValuesContainer').on('click', '.add-row', function() {
            var clone = $('.add_attribute_value:first').clone();
            clone.find('input').val(''); // Clear the input value in the new row
            $('#attributeValuesContainer').append(clone);
        });

        // Remove row
        $('#attributeValuesContainer').on('click', '.remove-row', function() {
            if ($('.add_attribute_value').length > 1) {
                $(this).closest('.add_attribute_value').remove();
            }
        });
    });
</script>
@endsection
