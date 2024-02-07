@extends('layouts.master')
@section('title') @lang('translation.starter') @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Admin @endslot
@slot('title') Customer Listing @endslot
@endcomponent

{!! Form::open([
    'route' => 'customer.index',
    'method' => 'get',
    'class' => 'needs-validation',
    'autocomplete' => 'off'
]) !!}
<div class="row" id="contactList">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center border-0">
                <h5 class="card-title mb-0 flex-grow-1">Customer List</h5>
                {{-- <div class="flex-shrink-0">
                    <a href="{{ route('customer.create') }}" class="btn btn-success">
                        <i class="ri-add-line align-bottom me-1"></i>Add New Customer
                    </a>
                </div> --}}
            </div>
            <div class="card-body border border-dashed border-end-0 border-start-0">
                <div class="row g-2">
                    {!! Form::open([
                        'route' => 'customer.index',
                        'method' => 'get',
                        'class' => 'needs-validation',
                        'autocomplete' => 'off'
                    ]) !!}

                    <div class="col-xl-4 col-md-6">
                        <div class="search-box">
                            {!! Form::text('search', request()->search, ['class' => 'form-control search', "placeholder"=>"Search by Customer Name..."]) !!}
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-xl-3 col-md-6">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="ri-calendar-2-line"></i></span>
                            {!! Form::text('created_at', request()->created_at, ['class' => 'form-control .flatpickr', 'data-provider'=>"flatpickr", "data-date-format"=>"d M, Y", "placeholder"=>"Select date", "id"=>"range-datepicker", "aria-describedby"=>"basic-addon1"]) !!}
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-xl-3 col-md-4">
                        {!! Form::select('status', ["active" => 'Active', 'inactive' => 'Inactive'], request()->status, ['placeholder' => 'Select Status', 'class' => 'form-select ' . ($errors->has('status') ? ' is_active' : null), "data-choices data-choices-search-false"]) !!}

                    </div>

                    <div class="col-xl-2 col-md-4">
                        {!! Form::submit('Submit', ['class' => 'btn btn-success w-100']); !!}
                    </div>

                    {!! Form::close() !!}
                </div>
                <!--end row-->
            </div>
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table align-middle table-nowrap" id="customerTable">
                        <thead class="table-light text-muted">
                            <tr>
                                <th class="sort" scope="col">Sr. no</th>
                                <th class="sort" scope="col">Name</th>
                                <th class="sort" scope="col">Email</th>
                                <th class="sort" scope="col">Mobile Number</th>
                                <th class="sort" scope="col">Status</th>
                                <th class="sort" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            @foreach ($customers as $customer)

                            {{-- {{  dd($customer); }} --}}
                                <tr>
                                    <td scope="col">{{ request('page') !== null ? (request('page') - 1) * 10 + $loop->iteration  :  $loop->iteration}}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->mobile_number }}</td>
                                    <td class="status">
                                        <span class='badge text-uppercase {{ ($customer->status === 'active') ? 'bg-success' : 'bg-danger' }}'>
                                            {{ $customer->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="hstack gap-2">
                                            {{-- Remove button --}}
                                            {{-- {{ Form::open(['url' => 'customer/' . $customer->id, 'method' => 'DELETE']) }}
                                                {!! Form::button('<i class="ri-delete-bin-5-fill align-bottom"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-soft-danger remove-list']) !!}
                                            {{ Form::close() }} --}}

                                            {{-- Edit button --}}
                                            {{-- <a class="btn btn-sm btn-soft-info edit-list" href="{{ route('customer.edit', ['customer' => $customer->id]) }}">
                                                <i class="ri-check-double-fill align-bottom"></i>
                                            </a> --}}

                                            <button class="btn btn-sm btn-soft-info edit-list" type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#VendorApprove" data-customer-name="{{ $customer->name }}" data-customer-email="{{ $customer->email }}" data-customer-mobile="{{ $customer->mobile_number }}" data-customer-type="{{ $customer->customer_type }}">
                                                <i class="ri-eye-fill align-bottom"></i>
                                            </button>

                                        </div>
                                    </td>
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
                            <p class="text-muted mb-0">We've searched more than 150+ customers. We did not find any customers for your search.</p>
                        </div>
                    </div>
                </div>
                {!! $customers->withQueryString()->links('layouts.paginate') !!}
            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row-->

<div id="VendorApprove" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Customer Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                {{-- <h5 class="fs-15">
                    Customer Information
                </h5> --}}

                <form>
                    <div class="mb-3">
                        <label for="customer-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="customer-name" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="customer-number" class="col-form-label">Mobile Number</label>
                        <input type="text" class="form-control" id="customer-number" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="customer-email" class="col-form-label">Email</label>
                        <input type="text" class="form-control" id="customer-email" disabled>
                    </div>

                    {{-- <div class="mb-3">
                        <label for="customer-type" class="col-form-label">Customer Type</label>
                        <input type="text" class="form-control" id="customer-type" disabled>
                    </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary ">Save Changes</button> --}}
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('script')
<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script type="text/javascript">
     $('#activateVendorModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var customerId = button.data('customer-id');
        var customerName = button.data('customer-name');
        var customerEmail = button.data('customer-email');
        var customerMobile = button.data('customer-mobile');

        // Update modal content with customer details
        $('#customerName').text(customerName);
        $('#customerEmail').text(customerEmail);
        $('#customerMobile').text(customerMobile);

        // You can also store customerId to use it when submitting the form
    });

    $('#VendorApprove').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var customerId = button.data('customer-id');
        var customerName = button.data('customer-name');
        var customerEmail = button.data('customer-email');
        var customerMobile = button.data('customer-mobile');
        var customerType = button.data('customer-type');

        // alert(customerType);

        // Update modal content with customer details
        $('#customer-name').val(customerName);
        $('#customer-email').val(customerEmail);
        $('#customer-number').val(customerMobile);
        $('#customer-type').val(customerType);


        var button = $(event.relatedTarget);
        var customerName = button.data('customer-name');
        var customerEmail = button.data('customer-email');

        var modal = $(this);
        modal.find('#customerName').text('Customer Name: ' + customerName);
        modal.find('#customerEmail').text('Customer Email: ' + customerEmail);

        // You can also store customerId to use it when submitting the form
    });



    // $('#activateVendorModal').modal('hide');
</script>
@endsection
