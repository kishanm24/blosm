@extends('layouts.master')
@section('title') @lang('translation.starter')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Master @endslot
@slot('title') Booking  @endslot
@endcomponent


{!! Form::open([
    'route' => 'entry-booking.index',
    'method' => 'get',
    'class' => 'needs-validation',
    "autocoumplete" => "off"
]) !!}
<div class="row" id="contactList">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center border-0">
                <h5 class="card-title mb-0 flex-grow-1">Booking List</h5>
                <div class="flex-shrink-0">

                    <a href="{{ route('entry-booking.create')}}" class="btn btn-success"><i class="ri-add-line align-bottom me-1"></i>Book New Slot</a>

                </div>
            </div>
            <div class="card-body border border-dashed border-end-0 border-start-0">
                <div class="row g-2">
                    <div class="col-xl-4 col-md-6">
                        <div class="search-box">
                            {!! Form::text('number_plate', request()->number_plate, ['class' => 'form-control search', "placeholder"=>"Search by Vehicle Number..."]) !!}
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xl-3 col-md-6">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="ri-calendar-2-line"></i></span>
                            {!! Form::text('date', request()->date, ['class' => 'form-control', 'data-provider'=>"flatpickr", "data-date-format"=>"d M, Y", "data-range-date"=>"true", "placeholder"=>"Select date", "id"=>"range-datepicker", "aria-describedby"=>"basic-addon1"]) !!}
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xl-3 col-md-4">
                        {!! Form::select('status',array("ENTRY"=>'Entry','PAID' => 'Paid', 'UNPAID'=>'UnPaid'), request()->status ,['placeholder' => 'Select Status', 'class'=>'form-control'.($errors->has('name') ? ' is_active' : null), "id"=>"status", "data-choices", "data-choices-search-false"]) !!}
                    </div>
                    <!--end col-->
                    <div class="col-xl-2 col-md-4">
                        {!! Form::submit('Submit', ['class' => 'btn btn-success w-100']); !!}
                    </div>
                </div>
                        {!! Form::close() !!}
                <!--end row-->
            </div>
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table align-middle table-nowrap" id="customerTable">
                        <thead class="table-light text-muted">
                            <tr>
                                <th class="sort" scope="col">Sr. no</th>
                                <th class="sort" scope="col">Vehicle Number</th>
                                <th class="sort" scope="col">Slot</th>
                                <th class="sort" scope="col">Price</th>
                                <th class="sort" scope="col">Driver Name</th>
                                <th class="sort" scope="col">Entry Time</th>
                                <th class="sort" scope="col">Action</th>
                                <th class="sort" scope="col">Status</th>
                            </tr>
                        </thead>
                        <!--end thead-->
                        <tbody class="list form-check-all">
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td scope="col">{{ request('page') !== null ? (request('page') - 1) * 10 + $loop->iteration  :  $loop->iteration}}</td>
                                    <td>{{ $booking->vehicle->vehicle_number }}</td>
                                    <td>{{ $booking->slot->start_time . " - " . $booking->slot->end_time . " - " . $booking->slot->duration}}</td>
                                    <td>{{ $booking->price}}</td>
                                    <td>{{ $booking->driver_name}}</td>
                                    <td>{{ $booking->entry_time}}</td>
                                    <td>
                                        <div class="hstack gap-2">
                                            {{-- <a class="btn btn-sm btn-soft-danger remove-list" href="{{ route('entry-booking.destroy', ['entry_booking' => $booking->id]) }}"><i class="ri-delete-bin-5-fill align-bottom"></i></a> --}}
                                            {{ Form::open(array('url' => 'entry-booking/'. $booking->id)) }}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {!! Form::button('<i class="ri-delete-bin-5-fill align-bottom"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-soft-danger remove-list']); !!}
                                            {{ Form::close() }}
                                            <a class="btn btn-sm btn-soft-info edit-list" href="{{ route('entry-booking.edit', ['entry_booking' => $booking->id]) }}"><i class="ri-pencil-fill align-bottom"></i></a>
                                        </div>
                                    </td>
                                    <td class="status"><span class='badge text-uppercase {{ ($booking->status != 'EXIT') ? 'badge-soft-success' : 'badge-soft-danger' }}'>{{ $booking->status }}</span></td>
                                </tr>
                            @endforeach

                            <!--end tr-->

                        </tbody>
                    </table>
                    <!--end table-->
                    <div class="noresult" style="display: none">
                        <div class="text-center">
                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px"></lord-icon>
                            <h5 class="mt-2">Sorry! No Result Found</h5>
                            <p class="text-muted mb-0">We've searched more than 150+ orders We did not find any orders for you search.</p>
                        </div>
                    </div>
                </div>

                {!! $bookings->withQueryString()->links('admin.paginate') !!}

            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row-->


@endsection
@section('script')
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
