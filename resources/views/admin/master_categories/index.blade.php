@extends('layouts.master')
@section('title') @lang('translation.starter') @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Admin @endslot
@slot('title') Master Catrgory Listing @endslot
@endcomponent

{!! Form::open([
    'route' => 'master-category.index',
    'method' => 'get',
    'class' => 'needs-validation',
    'autocomplete' => 'off'
]) !!}
<div class="row" id="contactList">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center border-0">
                <h5 class="card-title mb-0 flex-grow-1">Master Catrgory List</h5>
                <div class="flex-shrink-0">
                    <a href="{{ route('master-category.create') }}" class="btn btn-success">
                        <i class="ri-add-line align-bottom me-1"></i>Add New Master Catrgory
                    </a>
                </div>
            </div>
            <div class="card-body border border-dashed border-end-0 border-start-0">
                <div class="row g-2">
                    {!! Form::open([
                        'route' => 'master-category.index',
                        'method' => 'get',
                        'class' => 'needs-validation',
                        'autocomplete' => 'off'
                    ]) !!}

                    <div class="col-xl-4 col-md-6">
                        <div class="search-box">
                            {!! Form::text('search', request()->search, ['class' => 'form-control search', "placeholder"=>"Search by Vendor Name..."]) !!}
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-xl-2 col-md-4">
                        {!! Form::submit('Submit', ['class' => 'btn btn-success w-100']); !!}
                    </div>

                    {!! Form::close() !!}
                </div>
                <!--end row-->
            </div>
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table align-middle table-nowrap" id="vendorTable">
                        <thead class="table-light text-muted">
                            <tr>
                                <th class="sort" scope="col">Sr. no</th>
                                <th class="sort" scope="col">Names</th>
                                <th class="sort" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            @foreach ($vendors as $vendor)

                            {{-- {{  dd($vendor); }} --}}
                                <tr>
                                    <td scope="col">{{ request('page') !== null ? (request('page') - 1) * 10 + $loop->iteration  :  $loop->iteration}}</td>
                                    <td>{{ $vendor->name }}</td>
                                    <td style="display: flex;">
                                        <div class="hstack gap-2 m2">
                                            <a class="btn btn-sm btn-soft-success edit-list" href="{{route('master-category.edit',$vendor->id)}}">
                                                <i class="ri-edit-2-line align-bottom"></i>
                                            </a>
                                        </div>
                                        <!-- <div class="hstack gap-2 m2">
                                            <a class="btn btn-sm btn-soft-danger edit-list" href="#">
                                                <i class="ri-close-fill align-bottom"></i>
                                            </a>
                                        </div> -->
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
                            <p class="text-muted mb-0">We've searched more than 150+ vendors. We did not find any vendors for your search.</p>
                        </div>
                    </div>
                </div>
                {!! $vendors->withQueryString()->links('layouts.paginate') !!}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script type="text/javascript">

</script>
@endsection
