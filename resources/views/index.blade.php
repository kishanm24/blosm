@extends('layouts.master')
@section('title')
    @lang('translation.dashboards')
@endsection
@section('content')

<div class="row">
    <div class="col">

    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card crm-widget">
            <div class="card-body p-0">
                <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 g-0">
                    <div class="col">
                        <div class="py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Total Customers <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-user-line display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value" data-target="197">0</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col">
                        <div class="py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Total Vendor <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-user-line display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value" data-target="197">0</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col">
                        <div class="py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Total Products <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-space-ship-line display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value" data-target="197">0</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col">
                        <div class="py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Total sales <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-shopping-cart-line display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value" data-target="197">0</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col">
                        <div class="mt-3 mt-lg-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Total orders  <i class="ri-arrow-down-circle-line text-danger fs-18 float-end align-middle"></i></h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-service-line display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0"><span class="counter-value" data-target="2659">0</span></h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col">

        <div class="h-100">

            <div class="row">

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                        Products pending for approval
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    {{-- <h5 class="text-success fs-14 mb-0">
                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                                        +16.24 %
                                    </h5> --}}
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="100">100</span>
                                    </h4>
                                    <a href="" class="text-decoration-underline">View More</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title border bg-light text-primary bg-soft-success rounded fs-3">
                                        <i class="bx bx-dollar-circle text-success"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                        Vendors pending for approval
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    {{-- <h5 class="text-success fs-14 mb-0">
                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                                        +16.24 %
                                    </h5> --}}
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="100">100</span>
                                    </h4>
                                    <a href="" class="text-decoration-underline">View More</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title border bg-light text-primary bg-soft-success rounded fs-3">
                                        <i class="bx bx-dollar-circle text-success"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                        User registration today
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    {{-- <h5 class="text-success fs-14 mb-0">
                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                                        +16.24 %
                                    </h5> --}}
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="100">100</span>
                                    </h4>
                                    <a href="" class="text-decoration-underline">View More</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title border bg-light text-primary bg-soft-success rounded fs-3">
                                        <i class="bx bx-dollar-circle text-success"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->







            </div> <!-- end row-->


        </div> <!-- end .h-100-->

    </div> <!-- end col -->


</div>


@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
