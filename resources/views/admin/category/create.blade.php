@extends('layouts.master')
@section('title') @lang('translation.create-product') @endsection
@section('css')
<link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Master @endslot
@slot('title') Entry Booking @endslot
@endcomponent

{!! Form::open([
    'route' => 'entry-booking.store',
    'method' => 'post',
    'class' => 'needs-validation',
    "autocomplete" => "off",
    'enctype' => 'multipart/form-data'
]) !!}

    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div>
                                    {!! Form::label('vehicle_number', 'Enter Vehicle Number', ['class' => 'form-label']) !!}

                                    {!! Form::text('vehicle_number', null, ['placeholder' => 'Enter Vehicle Number','class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div>
                                    {!! Form::label('vehicle_model_id', 'Select Vehicle Model', ['class' => 'form-label']) !!}

                                    {!! Form::select('vehicle_model_id', $vehicle_models, null, ['placeholder' => 'Select Vehicle Model','class' => 'form-select', 'id' => 'vehicle','required']) !!}
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div>
                                    {!! Form::label('payment_mode', 'Select Payment Mode', ['class' => 'form-label']) !!}

                                    {!! Form::select('payment_mode', $payment_mode, null, ['placeholder' => 'Select Payment Mode','class' => 'form-select', 'required']) !!}
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div>
                                    {!! Form::label('parking_space_id', 'Select Parking Space', ['class' => 'form-label']) !!}

                                    {!! Form::select('parking_space_id', $parking_space, null, ['placeholder' => 'Select Parking Space','class' => 'form-select','required']) !!}
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div>
                                    {!! Form::label('slot_id', 'Select Slot', ['class' => 'form-label']) !!}

                                    {!! Form::select('slot_id', $slots, null, ['placeholder' => 'Select Parking Slots','class' => 'form-select','required', 'id' => 'slot']) !!}
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div>
                                    {!! Form::label('price', 'Price', ['class' => 'form-label']) !!}

                                    {!! Form::text('price', "", ['class' => 'form-control', 'required', 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="font-size-18 text-dark mb-4">Enter Driver Details: </h4>
                            </div>
                        </div>
                        <div class="row" id="driver_details">
                            {!! Form::text('old_driver_id', "" , ['class' => 'form-control', "hidden"]) !!}
                            <div class="col-md-6 mb-4">
                                <div>
                                    {!! Form::label('name[]', 'Enter Name', ['class' => 'form-label']) !!}

                                    {!! Form::text('name[]', "", ['placeholder' => 'Enter Name', 'class' => 'form-control', 'required']) !!}
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div>
                                    {!! Form::label('mobile[]', 'Enter Mobile Number', ['class' => 'form-label']) !!}

                                    {!! Form::number('mobile[]', null, ['placeholder' => 'Enter Mobile Number', 'class' => 'form-control', 'required']) !!}
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div>
                                    {!! Form::label('address[]', 'Enter Address', ['class' => 'form-label']) !!}

                                    {!! Form::text('address[]', "", ['placeholder' => 'Enter Address', 'class' => 'form-control', 'required']) !!}
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div>
                                    {!! Form::label('state_id[]', 'Select State', ['class' => 'form-label']) !!}

                                    {!! Form::select('state_id[]', $states, null, ['placeholder' => 'Select State','class' => ['form-select', 'state-select'], 'required']) !!}
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div>
                                    {!! Form::label('city_id[]', 'Select City', ['class' => 'form-label']) !!}

                                    {!! Form::select('city_id[]', [], null, ['placeholder' => 'Select City','class' => ['form-select', 'city-select'], 'required']) !!}
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div>
                                    {!! Form::label('document_type[]', 'Select Document Type', ['class' => 'form-label']) !!}

                                    {!! Form::select('document_type[]', $document_type, null, ['placeholder' => 'Select Document Type','class' => 'form-select', 'required']) !!}
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div>
                                    {!! Form::label('document_number[]', 'Enter Document Number', ['class' => 'form-label']) !!}

                                    {!! Form::text('document_number[]', null, ['placeholder' => 'Enter Document Number','class' => 'form-control', 'required']) !!}
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div id="document_btn">
                                    {!! Form::label('document[]', 'Upload Document', ['class' => 'form-label']) !!}

                                    {!! Form::file('document[]', ['placeholder' => 'Upload Document', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="font-size-18 text-dark mb-2">Enter Cleaner Details: </h4>
                                <button type="button" id="add_row" class="btn btn-soft-success mb-4"><i class="ri-add-circle-line align-middle me-1"></i>Add Cleaner</button>
                            </div>
                        </div>



                        <div id="cleanerRows">
                            <div class="row" id="row0"></div>
                        </div>
                        <div class="mt-1 text-danger">
                            @if($errors->any())
                                {{ implode('', $errors->all(':message')) }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end mb-3">
                {!! Form::submit('Submit', ['class' => 'btn btn-success w-sm', 'id' => "submit"]); !!}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                        <div class="row mb-4">
                            <div class="text-muted mb-2">
                                <button type="button" class="btn btn-success view-details-list modal-view" data-bs-toggle="modal" data-bs-target="#paymentModal">Fetch Latest Booking</button>
                            </div>
                            <div id="vehicle_details">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{!! Form::close() !!}

<div class="modal fade" id="paymentModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="model-content">

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#refresh_data', async function() {
                const response = await $.ajax({
                    url: `/entry-booking?api_call=true`,
                    method: 'GET',
                    dataType: 'json',
                });
                if(response) {
                    table = '';
                    response.forEach((element, i) => {
                        table += `
                            <tr>
                                <td scope="col">${i + 1}</td>
                                <td>${ element["vehicle"]["vehicle_number"] }</td>
                                <td>${ element["price"] }</td>
                                <td>${ element["payment_mode"] }</td>
                                <td>${ element["status"] }</td>
                            </tr>`
                    });
                    var modelContent = $('#table_content');
                    modelContent.html(table);
                }
            });
        });
    </script>
</div>
@endsection
@section('script')

@endsection
