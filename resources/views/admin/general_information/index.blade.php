@extends('layouts.master')
@section('title') @lang('translation.starter') @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Admin @endslot
@slot('title') General Information Listing @endslot
@endcomponent

{!! Form::open([
    'route' => 'general-information.index',
    'method' => 'get',
    'class' => 'needs-validation',
    'autocomplete' => 'off'
]) !!}
<div class="row" id="contactList">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center border-0">
                <h5 class="card-title mb-0 flex-grow-1">General Information List</h5>
                <div class="flex-shrink-0">
                    <a href="{{ route('general-information.create') }}" class="btn btn-success">
                        <i class="ri-add-line align-bottom me-1"></i>Add New General Information
                    </a>
                </div>
            </div>
            <div class="card-body border border-dashed border-end-0 border-start-0">
                <div class="row g-2">
                    {!! Form::open([
                        'route' => 'general-information.index',
                        'method' => 'get',
                        'class' => 'needs-validation',
                        'autocomplete' => 'off'
                    ]) !!}

                    <div class="col-xl-4 col-md-6">
                        <div class="search-box">
                            {!! Form::text('search', request()->search, ['class' => 'form-control search', "placeholder"=>"Search by Name..."]) !!}
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
                                <th class="sort" scope="col">Description</th>
                                <th class="sort" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            @foreach ($general_info as $info)

                            {{-- {{  dd($info); }} --}}
                                <tr>
                                    <td scope="col">{{ request('page') !== null ? (request('page') - 1) * 10 + $loop->iteration  :  $loop->iteration}}</td>
                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->description }}</td>
                                    <td style="display: flex;">
                                        <div class="hstack gap-2 m2">
                                            <a class="btn btn-sm btn-soft-success edit-list" href="{{route('general-information.edit',$info->id)}}">
                                                <i class="ri-edit-2-line align-bottom"></i>
                                            </a>
                                        </div>
                                        <form action="{{ route('general-information.destroy', ['general_information' => $info->id]) }}" method="POST">
                                            @csrf

                                            @method('DELETE')
                                            <div class="hstack gap-2 m2">
                                                 <button type="submit" class="btn btn-sm btn-soft-danger"><i class="ri-close-fill align-bottom"></i></button>
                                            </div>
                                        </form>
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
                            <p class="text-muted mb-0">We've searched more than 150+ general information. We did not find any general information for your search.</p>
                        </div>
                    </div>
                </div>
                {!! $general_info->withQueryString()->links('layouts.paginate') !!}
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
